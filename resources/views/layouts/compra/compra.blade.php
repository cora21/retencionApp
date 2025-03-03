@extends('layouts.empreApp') <!-- Nombre del archivo de la plantilla -->

@section('titulo', 'Libro de Compra')
@section('contenido')
<h3>aqui crearemos el libro de compras</h3>
<br>
<div class="container mt-3">
    <div class="d-flex gap-3 mb-3">
        <button class="btn btn-outline-primary">Botón 1</button>
        <button class="btn btn-outline-primary">Botón 2</button>
        <button class="btn btn-outline-primary">Botón 3</button>
        <button class="btn btn-outline-primary">Botón 4</button>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title">Contenido principal</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>N° de Ope.</th>
                            <th>Fecha</th>
                            <th>N° RIF</th>
                            <th>Proveedor</th>
                            <th>Número de Factura</th>
                            <th>Número de Control</th>
                            <th>Tipo de Transacción</th>
                            <th>Total</th>
                            <th>Base</th>
                            <th>IVA</th>
                            <th class="p-2">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control" type="text" value=""></td>
                            <td>
                                <input class="form-control" style="width: 160px;" type="date">
                            </td>
                            <td>
                                <input class="form-control cedula-rif" style="width: 160px;" type="text">
                            </td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td><input class="form-control" type="text" value=""></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <i class="fas fa-plus text-success fs-5 cursor-pointer"></i>
                                    <i class="fas fa-minus text-danger fs-5 cursor-pointer"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const input = document.querySelector('.cedula-rif');

        input.addEventListener('input', function() {
            // Obtener el valor del input y eliminar guiones existentes
            let value = this.value.replace(/-/g, '');

            // Validar que el primer carácter sea una letra y el resto sean números
            if (/^[A-Za-z]\d*$/.test(value)) {
                // Extraer la letra inicial (asegurarse de que sea mayúscula)
                const letra = value[0].toUpperCase();

                // Extraer los números restantes
                let numeros = value.slice(1);

                // Rellenar con ceros a la izquierda para asegurar 9 dígitos
                numeros = numeros.padStart(9, '0');

                // Separar los primeros 8 dígitos y el último dígito
                const parte1 = numeros.slice(0, 8); // Primeros 8 números
                const parte2 = numeros.slice(8, 9); // Último número

                // Formatear el valor: letra + "-" + primeros 8 números + "-" + último número
                value = `${letra}-${parte1}-${parte2}`;
            } else {
                // Si el valor no es válido, mantener el formato anterior o limpiar el campo
                value = this.value.replace(/[^A-Za-z\d-]/g, ''); // Eliminar caracteres no válidos
                if (!/^[A-Za-z]\d*$/.test(value.replace(/-/g, ''))) {
                    value = ''; // Limpiar el campo si no cumple con el formato
                }
            }

            // Actualizar el valor del input
            this.value = value;
        });
    });
</script>


{{-- input fecha --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const datepicker = document.querySelector('.datepicker');

        // Formatear la fecha al cambiar el valor
        datepicker.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const day = String(selectedDate.getDate()).padStart(2, '0');
            const month = String(selectedDate.getMonth() + 1).padStart(2, '0');
            const year = selectedDate.getFullYear();
            // Formatear la fecha como dd/mm/yyyy
            const formattedDate = `${day}/${month}/${year}`;
        });
    });
</script>
@endsection