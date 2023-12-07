<div class="row">
    <div class="col-12">
        <form action="{{route('information.post')}}">
            @method('POST')
            <div class="mb-3"> 
                <input type="hidden" class="form-control" name="id" value={{ $data['id'] ?? "add"}} >
                <div>
                    <label for="">Lokasi</label>
                    <textarea name="lokasi" class="form-control"id="" cols="30" rows="10">{{ $data['lokasi'] ?? ""}}</textarea>
                </div>
                <div>
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="deskripsi" value='{{ $data['deskripsi'] ?? ""}}' >
                </div>
            </div> 
            <div>
                <label for="">kedalaman</label>
                <input type="number" class="form-control" name="kedalaman" value='{{ $data['kedalaman'] ?? ""}}' >
            </div> 
            <div class="mb-3"> 
                <div>
                    <label for="">magnitute</label>
                    <input type="number" class="form-control" name="magnitute" value='{{ $data['magnitute'] ?? "0" }}' >
                </div>
            </div>  
        </form>
    </div>
</div>
 