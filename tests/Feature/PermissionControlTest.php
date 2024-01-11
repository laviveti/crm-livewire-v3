<?php

use App\Models\Can;
use App\Models\Permission;
use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\UsersSeeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\seed;

it('should be able to give an user a permission to do something', function () {
    $user = User::factory()->create();
    $user->givePermissionTo(Can::BE_AN_ADMIN);
    expect($user)
        ->hasPermissionTo(Can::BE_AN_ADMIN)
        ->toBeTrue();
    assertDatabaseHas('permissions', [
        'key' => Can::BE_AN_ADMIN,
    ]);
    assertDatabaseHas(
        'permission_user',
        [
            'user_id' => $user->id,
            'permission_id' => Permission::where('key', '=', Can::BE_AN_ADMIN)->first()->id,
            // 'permission_id' => Permission::where(['key' => Can::BE_AN_ADMIN])->first()->id (alternativa em array)
        ]
    );
});

test('permission has to have a seeder', function () {
    /** @var TestCase $this */
    $this->seed(PermissionSeeder::class);
    assertDatabaseHas('permissions', [
        'key' => Can::BE_AN_ADMIN,
    ]);
});

test('seed with an admin user', function () {
    seed([PermissionSeeder::class, UsersSeeder::class]);

    assertDatabaseHas('permissions', [
        'key' => Can::BE_AN_ADMIN,
    ]);

    assertDatabaseHas('permission_user', [
        'user_id' => User::first()?->id,
        'permission_id' => Permission::where(['key' => Can::BE_AN_ADMIN])->first()?->id,
    ]);
});

it('should block access to the admin page if the user does not have permission', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertForbidden();
});

test("let's make sure that we are using cache to store user permissions", function () {
    $user = User::factory()->create();
    $user->givePermissionTo(Can::BE_AN_ADMIN);

    $cacheKey = "user::{$user->id}::permissions";

    expect(Cache::has($cacheKey))->toBeTrue('checking if cache key exists')
        ->and(Cache::get($cacheKey))->toBe($user->permissions, 'checking if permissions are the same as the user');
});

test("let's make sure that we are using the cache the retrieve/check when the user has the given permission", function () {
    $user = User::factory()->create();

    $user->givePermissionTo(Can::BE_AN_ADMIN);

    // Verificar se eu não tive nenhum hit no banco de dados a partir desse ponto
    DB::listen(fn ($query) => throw new Exception('We got a hit'));
    $user->hasPermissionTo(Can::BE_AN_ADMIN);

    expect(true)->toBeTrue();
});
