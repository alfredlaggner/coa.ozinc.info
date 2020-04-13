@extends('layouts.app')
@section('title', 'Download')
@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <b>Certificates of Analysis Document Download</b>
            </div>

            <div class="col-md-12">

                <br/>
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br/>
                @endif
                <div class="form-group row">
                    <div class="col-sm">
                        <input type="text" class="form-control" id="myInput1" onkeyup="myFunction()"
                               placeholder="Search for names..">
                    </div>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="myInput2" onkeyup="myFunction1()"
                               placeholder="Search for batches..">
                    </div>
                </div>
                <table class="table table-striped table-bordered" id="coa_table" style="width: 100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Strain</th>
                        <th>Batch Number</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($coas as $coa)

                        <tr>
                            <td>{{$coa->id}}</td>
                            <td>{{$coa->product_name}}</td>
                            <td>{{$coa->coa_number}}</td>

                            <td>
                                <form action="{{route('download', $coa['id'])}}" method="get">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Download!</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer">
                Copyright Oz Distribution &copy;@php   echo date("Y"); @endphp
            </div>

        </div>
    </div>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput1");
            filter = input.value.toUpperCase();
            table = document.getElementById("coa_table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function myFunction1() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            table = document.getElementById("coa_table");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection





