<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="csrf-token" content="{{ @csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('partial.js');
</head>
<body>
    <main id="main-component"> 
        {{-- HEADER --}}

        <div class="container mt-5">
            @include('partial.header');

            <div class="row  ">
                <div class="col-md-12 text-end mb-5">
                    <button class="btn btn-success creatData" data-id="add"> add</button>
                </div>
                <div class="col-xl-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <td>lokasi</td>
                                <td>deskripsi</td>
                                <td>kedalaman</td>
                                <td>magnitute</td>
                                <td>time</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($info as $v)
                          <tr>
                            <td>{{ $v['lokasi']}}</td>
                            <td>{{ $v['deskripsi']}}</td>
                            <td>{{ $v['kedalaman']}}</td>
                            <td>{{ $v['magnitute']}}</td>
                            <td>{{ $v['time']}}</td>
                            <td>
                                
                    <button class="btn btn-success edit-data" data-id="{{ $v['id']}}"> edit</button>
                    <button class="btn btn-success delete-data" data-id="{{ $v['id']}}"> delete</button>
                            </td>
                          </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
          
                  </div>
            </div>
        </div>
 
    </main> 
    @include('partial.css');
</body>

<script>
    $(document).ready(function(){
        $('.table').DataTable();
        $(document).on('click','.creatData, .edit-data',function(e){
            e.preventDefault();
        let id = $(this).data('id');
        let url = "{{ url('information/show')}}" + "/" +id;
        url = url.replace(":id", id); 
        $.MyModal(url, {},{
                title:  (id =='add' ? 'Tambah' : 'Edit') + ' Kategori',
                closable: false,
                buttons: [{
                    label: 'Close', 
                    action: function(dialogItself){
                        dialogItself.close();
                    }
                }, {
                    label: 'Save', 
                    cssClass: 'btn-primary',
                    action: function(dialogItself){
                        const $form = dialogItself.getModalBody().find('form');
                        let $footer = dialogItself.getModalFooter().find('.btn-primary');
                        $footer.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'); 
                        $form.ug("submit", function(r){
                            $footer.html('Save');
                            // check validation
                            $form.ug("validateForm",r.errors); 
                            if(r.status){
                                ug.alert(r.msg);
                                dialogItself.close();
                                location.reload(); 
                            }
                        },"json");
                    }
                }]
        }); 
        });

        $(document).on('click','.delete-data',function(e){
        let id = $(this).data('id') 
        let url ="{{ url('information/delete')}}" + "/" +id;
        $.confirm('Yakin Hapus ?', function(result) {
            if(result) {
                ug.action('DELETE', url ,{}, function(r){
                    if(r.status){
                        ug.alert(r.msg)
                    }
                    location.reload(); 
                }, "json");
            }
        });
    });
    });
</script>
</html>