@extends('layouts.app')
<title>Danh Sách Phiếu Nhập Kho</title>
@section('header')

<link rel="stylesheet" type="text/css" href="/core/css/datatable.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<style>
    [cloak] {
        display: none !important;
    }
</style>
@endsection

@section('content')
<div class="col-lg-12" cloak>
    <div class="block">
        <div class="title"><strong>Danh Sách Phiếu Nhập Kho</strong></div>
        <div class="block-body">
                <br>
                <div id="txtshow">
                    <div class="table-responsive">
                        <table id="tables" class="display">
                            <thead>
                                <tr class="table-active">
                                    <th>In Phiếu</th>
                                    <th>Sửa|Xoá </th>
                                    <th>ID Phiếu</th>
                                    <th>Ngày Nhập</th>
                                    <th>Nhà Cung Cấp</th>
                                    <th>Người Lập Phiếu</th>                                    
                                    <th>ID Phiếu Mua Hàng</th>
                                    <th>Tổng Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $inv)
                                <tr>
                                    <td><a href="{{ route('invoices.show',$inv->id)}}">In</a> </td>
                                    <td>
                                        <a href="{{ route('invoices.edit', $inv->id)}}">Sửa</a> |
                                        <a href="#" onclick="$('form#invoice_delete_{{$inv->id}}').trigger('submit')">Xoá</a>
                                        <div style='display=none'>
                                            <form id='invoice_delete_{{$inv->id}}' method='POST' action="{{ route('invoices.destroy', $inv->id)}}" >
                                                @method('DELETE')
                                                @csrf
                                                
                                            @if ($inv->Bill == 10)
                                             <input name="cust" style="display:none" value="true" type="text"/>
                                             @endif
                                            </form>
                                        </div>
                                    </td>
                                    <td class="table-active">{{ $inv->id  }}</td>
                                    <td class="table-secondary">{{ $inv->Date   }}</td>
                                    <td>{{ \App\Account::find($inv->Bill)->name   }}</td>
                                    <td>{{ \App\Subaccount::find($inv->Customer)->accountname  }}</td>
                           
                                    <td class="table-active" style='text-align:right'>{{ $inv->Total   }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

@section('footer')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
</script>

<script>
    $(document).ready( function () {
        $('[cloak]').removeAttr('cloak');
        $('#tables').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    } );
</script>

@endsection
