<?php

use App\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'plan_name' => 'Mensual', 
            'plan_description' => '<li><i class="fas fa-dollar-sign"></i> <del>Descuento</del></li> <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li> <li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li> <li><i class="fas fa-headset"></i> Soporte técnico</li> <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li> <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>',
            'plan_price' => '19',
            'plan_type' => 'MFMensual',
            'name' => 'ManageFiles',
            'description' => 'Suscripción mensual',
            'btn_label' => 'Seleccionar plan',
            'amount' => 1900
        ]);
  
        Plan::create([
            'plan_name' => 'Semestral', 
            'plan_description' => '<li><i class="fas fa-dollar-sign"></i> Descuento de <b>$15</b></li> <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li> <li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li> <li><i class="fas fa-headset"></i> Soporte técnico</li> <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li> <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>',
            'plan_price' => '99',
            'plan_type' => 'MFBianual',
            'name' => 'ManageFiles',
            'description' => 'Suscripción semestral',
            'btn_label' => 'Seleccionar plan',
            'amount' => 9900
        ]);
  
        Plan::create([
            'plan_name' => 'Anual', 
            'plan_description' => '<li><i class="fas fa-dollar-sign"></i> Descuento de <b>$29</b></li> <li><i class="fas fa-user-circle"></i> Múltiples inicios de sesión</li> <li><i class="far fa-hdd"></i> 20 GB de almacenamiento</li> <li><i class="fas fa-headset"></i> Soporte técnico</li> <li><i class="far fa-calendar-alt"></i> Acceso 24/7</li> <li><i class="fas fa-cloud-upload-alt"></i> Subir cualquier tipo de archivos</li>',
            'plan_price' => '199',
            'plan_type' => 'MFAnual',
            'name' => 'ManageFiles',
            'description' => 'Suscripción anual',
            'btn_label' => 'Seleccionar plan',
            'amount' => 19900
        ]);
    }
}
