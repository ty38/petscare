@extends('admin.index')

@section('menu')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $menu1 }}</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $menu2 }}</a></li>
                    <li class="breadcrumb-item active">{{ $menu3 }}</li>
                </ol>
            </div>
            <h4 class="page-title">Tabel Basis Aturan</h4>
        </div>
    </div>
</div>

@if (session('jenis'))

      <div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i>  {{ session('jenis') }}
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a data-toggle="modal" data-target="#add-dokter" href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i>New</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-right">
                            <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                            <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                            <button type="button" class="btn btn-light mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                        <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>No</th>
                                <th>Nama Gejala</th>
                                <th>Nama Penyakit</th>
                                <th>Nilai Bobot</th>
                                <th>Create at</th>
                                <th>Update at</th>
                                
                                <th>Jenis Hewan</th>
                                <th style="width: 75px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($basis_a as $item)

                            
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                   
                                   {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->nama_gejala }}
                                   
                                </td>

                                <td>
                                    {{ $item->nama_penyakit }}
                                </td>

                                <td>
                                    {{ $item->bobot }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                   {{ $item->updated_at }}
                                </td>

                                <td>
                               
                                    {{ $item->nama_hewan }}
                                </td>

                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit-hewan{{ $item->id_basis_atauran }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <form action="/basis_a/{{ $item->id_basis_atauran }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('apakah Anda akan menghapus data ini?')" class="action-icon border-0"><i class="mdi mdi-delete"></i></button>
                                    </form>
                                   
                                </td>
                            </tr>

                            {{-- modal edit hewan --}}
                            <form method="POST" action="/basis_a/{{ $item->id_basis_atauran }}">
                                @csrf
                                @method('put')
                                <div id="edit-hewan{{ $item->id_basis_atauran }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            
                            
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                   
                                                <h4 class="modal-title">Edit Basis Aturan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body p-4">
                            
        
                                               <div class="row">
                                                <div class="col-md-12">

                                                    <div class="form-group">
                                                        <label for="field-3" class="control-label">Nama Gejala</label>
                                                        
                                                        <select name="id_gejala" id="" class="form-control">
                                                            @foreach ($gejala as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_gejala }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        {{ $item->bobot }}
                                                        <label for="field-3" class="control-label">Nama Penyakit</label>
                                                        
                                                        <select name="id_penyakit" id="" class="form-control">
                                                            @foreach ($penyakit as $items)
                                                            <option value="{{ $items->id }}">{{ $items->nama_penyakit }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                            
                                           
                            
                                           
                                            
                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Bobot </label>
                                                        <input name="bobot" value="{{ $item->id_basis_atauran }}" type="text" maxlength="12"  class="form-control" id="field-1" required="required" placeholder="0.02">
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-6">
                                                  
                                                   
                                                    <div class="form-group">
                                                        <label for="field-2"  class="control-label">Jenis Hewan</label>
                                                        
                                                        <select class="form-control" name="id_hewan" id="">
                                                            @foreach ($hewan as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama_hewan }}</option>
                                                            @endforeach
                                                        </select>
                                                           
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                                    
                                            <div class="row">
                                        
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
                                    </div>
                            
                                </div>
                            </div>
                            
                            </div>
                            
                            </form>

                            {{-- end edit modal --}}
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>


{{-- add form model --}}

<form method="POST" action="/basis_a">
    @csrf
    <div id="add-dokter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">New</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">


                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Gejala</label>
                            <select name="id_gejala" id="" class="form-control">
                                @foreach ($gejala as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_gejala }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-3" class="control-label">Nama Penyakit</label>
                            <select class="form-control" name="id_penyakit" id="">
                                @foreach ($penyakit as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_penyakit }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

               

               
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Bobot </label>
                            <input  type="text" maxlength="12" name="bobot" class="form-control" id="field-1" required="required" placeholder="0.22">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2"  class="control-label">Jenis Hewan</label>
                            <select class="form-control" name="id_hewan" id="">
                                @foreach ($hewan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_hewan }}</option>
                                @endforeach
                            </select>
                               
                               
                            
                        </div>
                    </div>
                </div>

                
                <div class="row">
                  

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Ok, Simpan</button>
        </div>



    </div>
</div>

</div>

</form>

{{-- and add --}}

@endsection
