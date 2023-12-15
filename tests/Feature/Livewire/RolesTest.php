<?php

namespace Tests\Feature\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Livewire\Roles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RolesTest extends TestCase
{
    use RefreshDatabase;

    public function test_component_exists_on_the_page()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);

        $this->actingAs($user);
        $this->get(route('roles'))
            ->assertSeeLivewire(Roles::class);
    }

    public function test_role_list_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);

        Livewire::actingAs($user)
            ->test(Roles::class)
            ->assertStatus(200);
    }

    public function test_displays_roles(): void
    {
        $role = Role::factory()->create(['title' => 'Super super Admin']);
        $user = User::factory()->create();
        $user->roles()->attach(1);

        Livewire::actingAs($user)
            ->test(Roles::class)
            ->assertSee('Super super Admin');
    }

    public function test_create_role_modal_is_displayed(): void
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);

        $permission =  Permission::inRandomOrder()->first();

        Livewire::actingAs($user)
            ->test(Roles::class)
            ->call('create')
            ->assertSee($permission->menu)
            ->assertStatus(200);
    }
}