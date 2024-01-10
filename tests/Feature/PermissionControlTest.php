<?php

use App\Models\Permission;
use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Tests\TestCase;

use function Pest\Laravel\assertDatabaseHas;

it('should be able to give an user a permission to do something', function () {
    $user = User::factory()->create();
    $user->givePermissionTo('be an admin');
    expect($user)
        ->hasPermissionTo('be an admin')
        ->toBeTrue();
    assertDatabaseHas('permissions', [
        'key' => 'be an admin',
    ]);
    assertDatabaseHas(
        'permission_user',
        [
            'user_id' => $user->id,
            'permission_id' => Permission::where('key', '=', 'be an admin')->first()->id,
            // 'permission_id' => Permission::where(['key' => 'be an admin'])->first()->id (alternativa em array)
        ]
    );
});

test('permission has to have a seeder', function () {
    /** @var TestCase $this */
    $this->seed(PermissionSeeder::class);
    assertDatabaseHas('permissions', [
        'key' => 'be an admin',
    ]);
});
