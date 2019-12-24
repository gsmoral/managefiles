<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //File
      // Permission::create(['name' => 'file.create', 'description' => 'Subir archivos']);
      // Permission::create(['name' => 'file.store', 'description' => 'Almacenar archivos']);
      // Permission::create(['name' => 'file.images', 'description' => 'Ver las imágenes']);
      // Permission::create(['name' => 'file.videos', 'description' => 'Ver los videos']);
      // Permission::create(['name' => 'file.documents', 'description' => 'Ver los documentos']);
      // Permission::create(['name' => 'file.audios', 'description' => 'Ver los audios']);

      //Roles
      Permission::create(['name' => 'role.index', 'description' => 'Mostrar todos los roles']);
      Permission::create(['name' => 'role.create', 'description' => 'Crear un nuevo rol']);
      Permission::create(['name' => 'role.store', 'description' => 'Almacenar un nuevo rol']);
      Permission::create(['name' => 'role.edit', 'description' => 'Editar un rol']);
      Permission::create(['name' => 'role.update', 'description' => 'Actualizar un rol']);
      Permission::create(['name' => 'role.show', 'description' => 'Ver detalles del rol']);
      Permission::create(['name' => 'role.destroy', 'description' => 'Eliminar un rol']);

      /* //Subscriptions plans

      Permission::create(['name' => 'plan.index', 'description' => 'Mostrar todos los planes']);
      Permission::create(['name' => 'plan.create', 'description' => 'Crear un nuevo plan']);
      Permission::create(['name' => 'plan.edit', 'description' => 'Editar un plan']);
      Permission::create(['name' => 'plan.show', 'description' => 'Ver detalles del plan']);
      Permission::create(['name' => 'plan.destroy', 'description' => 'Eliminar un plan']); */

      $admin = Role::create(['name' => 'Admin']);
      $subscriber = Role::create(['name' => 'Suscriptor']);

      $admin->givePermissionTo(Permission::all());

        $subscriber->givePermissionTo([
          	'file.create',
     		'file.store',
     		'file.images'
          ]);

      $user = User::find(1); //test@test.com
      $user->assignRole('Admin');
    }
}
