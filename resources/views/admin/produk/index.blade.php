@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-body">

        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-nowrap" style="width: 20px">No</th>
                    <th class="text-nowrap">nama</th>
                    <th class="text-nowrap" style="width: 170px">Tindakan</th>
                </tr>
            </thead>
            <tbody>

                {{-- <tr class="">
                    <td scope="row">R1C1</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                </tr>
                <tr class="">
                    <td scope="row">Item</td>
                    <td>Item</td>
                    <td>Item</td>
                </tr> --}}
            </tbody>
        </table>


    </div>
</div>
@endsection
