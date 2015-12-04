<table style="width:100%">
   <tr>
       <td>First Name</td>
       <td>Last Name</td>
   </tr>
   <tr>
       <td>
            <div class="input-control text full-size">
                <input type="text" name="namadepan" value="{{ $profile->namadepan }}" required>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
       </td>
       <td>
            <div class="input-control text full-size">
                <input type="text" name="namabelakang" value="{{ $profile->namabelakang }}" required>
            </div>
       </td>
   </tr>
   <tr>
       <td>Nickname</td>
       <td>Gender</td>
   </tr>
   <tr>
       <td>
            <div class="input-control text full-size">
                <input type="text" name="namapengguna" required value="{{ $profile->namapengguna }}">
            </div>
       </td>
       <td>
            <div class="input-control select full-size">
                <select name="jeniskelamin">
                    <option value="Male" {{ ($profile->jeniskelamin=='male')?'selected':'' }}>Male</option>
                    <option value="Female" {{ ($profile->jeniskelamin=='female')?'selected':'' }}>Female</option>
                </select>
            </div>
       </td>
   </tr>
   <tr>
       <td>Birth Place</td>
       <td>Birth Date</td>
   </tr>
   <tr>
       <td>
            <div class="input-control text full-size">
                <input type="text" required name="tempatlahir" value="{{ $profile->tempatlahir }}">
            </div>
       </td>
       <td>
            <div class="input-control text full-size" data-role="datepicker" data-format="dd mmmm yyyy">
                <input type="text" name="tanggallahir"  value="{{ date_format(date_create(($profile->tanggallahir=='0000-00-00')?date('d M Y'):$profile->tanggallahir),'d M Y') }}">
                <button class="button"><span class="mif-calendar"></span></button>
            </div>
       </td>
   </tr>
   <tr>
       <td>Relationship</td>
       <td>Phone</td>
   </tr>
   <tr>
       <td>
            <div class="input-control text full-size">
                <select name="hubungan">
                    <option {{ ($profile->hubungan=='Single')?'selected':'' }} value="Single">Single</option>
                    <option {{ ($profile->hubungan=='In a Relationship')?'selected':'' }} value="In a Relationship">In a Relationship</option>
                    <option {{ ($profile->hubungan=='Married')?'selected':'' }} value="Married">Married</option>
                </select>
            </div>
       </td>
       <td>
            <div class="input-control text full-size">
                <input type="text" name="phone" value="{{ $profile->phone }}">
            </div>
       </td>
   </tr>
   <tr>
       <td colspan="2">Display Picture</td>
   </tr>
   <tr>
       <td colspan="2">
            <div class="input-control file full-size" data-role="input">
                <input type="file" name="foto" {{ $foto_require }}>
                <button class="button"><span class="mif-folder"></span></button>
            </div>
       </td>
   </tr>
   <tr>
       <td colspan="2">Home Address</td>
   </tr>
   <tr>
       <td colspan="2">
            <div class="input-control textarea full-size">
                <textarea name="addr">{{ $profile->addr }}</textarea>
            </div>
       </td>
   </tr>
   <tr>
       <td colspan="2"><button class="button place-right" id="submit_update"><span id="span_process" style="display:none;" class="mif-spinner2 mif-ani-spin"></span> <span style="display:none;" id="span_process_1">Processing</span> <span id="span_process_2">Update</span></button></td>
   </tr>
</table>