<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departaments = array(
            array('id' => '1', 'name' => 'Antioquia', 'code' => '05', 'country_id' => '49'),
            array('id' => '2', 'name' => 'Atlantico', 'code' => '08', 'country_id' => '49'),
            array('id' => '3', 'name' => 'Bogota', 'code' => '11', 'country_id' => '49'),
            array('id' => '4', 'name' => 'Bolivar', 'code' => '13', 'country_id' => '49'),
            array('id' => '5', 'name' => 'Boyaca', 'code' => '15', 'country_id' => '49'),
            array('id' => '6', 'name' => 'Caldas', 'code' => '17', 'country_id' => '49'),
            array('id' => '7', 'name' => 'Caqueta', 'code' => '18', 'country_id' => '49'),
            array('id' => '8', 'name' => 'Cauca', 'code' => '19', 'country_id' => '49'),
            array('id' => '9', 'name' => 'Cesar', 'code' => '20', 'country_id' => '49'),
            array('id' => '10', 'name' => 'Cordoba', 'code' => '23', 'country_id' => '49'),
            array('id' => '11', 'name' => 'Cundinamarca', 'code' => '25', 'country_id' => '49'),
            array('id' => '12', 'name' => 'Choco', 'code' => '27', 'country_id' => '49'),
            array('id' => '13', 'name' => 'Huila', 'code' => '41', 'country_id' => '49'),
            array('id' => '14', 'name' => 'La Guajira', 'code' => '44', 'country_id' => '49'),
            array('id' => '15', 'name' => 'Magdalena', 'code' => '47', 'country_id' => '49'),
            array('id' => '16', 'name' => 'Meta', 'code' => '50', 'country_id' => '49'),
            array('id' => '17', 'name' => 'Nariño', 'code' => '52', 'country_id' => '49'),
            array('id' => '18', 'name' => 'Norte de Santander', 'code' => '54', 'country_id' => '49'),
            array('id' => '19', 'name' => 'Quindio', 'code' => '63', 'country_id' => '49'),
            array('id' => '20', 'name' => 'Risaralda', 'code' => '66', 'country_id' => '49'),
            array('id' => '21', 'name' => 'Santander', 'code' => '68', 'country_id' => '49'),
            array('id' => '22', 'name' => 'Sucre', 'code' => '70', 'country_id' => '49'),
            array('id' => '23', 'name' => 'Tolima', 'code' => '73', 'country_id' => '49'),
            array('id' => '24', 'name' => 'Valle del Cauca', 'code' => '76', 'country_id' => '49'),
            array('id' => '25', 'name' => 'Arauca', 'code' => '81', 'country_id' => '49'),
            array('id' => '26', 'name' => 'Casanare', 'code' => '85', 'country_id' => '49'),
            array('id' => '27', 'name' => 'Putumayo', 'code' => '86', 'country_id' => '49'),
            array('id' => '28', 'name' => 'San Andres', 'code' => '88', 'country_id' => '49'),
            array('id' => '29', 'name' => 'Amazonas', 'code' => '91', 'country_id' => '49'),
            array('id' => '30', 'name' => 'Guainia', 'code' => '94', 'country_id' => '49'),
            array('id' => '31', 'name' => 'Guaviare', 'code' => '95', 'country_id' => '49'),
            array('id' => '32', 'name' => 'Vaupes', 'code' => '97', 'country_id' => '49'),
            array('id' => '33', 'name' => 'Vichada', 'code' => '99', 'country_id' => '49')
        );
        Department::insert($departaments);
    }
}
