<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->command->alert('Creating roles and permissions');
        // Reset cached
        app()['cache']->forget('spatie.permission.cache');

        DB::transaction(function() {

            $actions = ['list', 'create', 'edit', 'delete'];
            $models = ['users', 'doctors', 'patients', 'schedules'];
            $permissions = array();


            for ($i = 0; $i < 4; $i++) {
                foreach ($actions as $action) {
                    $permissionName = $action . ' ' . $models[$i];
                    Permission::create(['name' => $permissionName]);

                    $permissions[] = $permissionName;
                }
            }
            try {
                $user = new User();
                $user->email = env('ADMIN_USER', 'admin@admin.com');
                $user->name = 'Superman';
                $user->password = bcrypt(env('ADMIN_PASS', 'changeme'));
                $user->save();
            }
            catch ( \Exception $e )
            {
                $this->command->error('Fail to create admin user. ' . $e->getTraceAsString() );
            }
            finally {
                // create role.
                $role = Role::create(['name' => 'admin']);
                $role->givePermissionTo($permissions);

                $user->assignRole('admin');
            }

        });

        $this->command->line('Done.');

    }
}
