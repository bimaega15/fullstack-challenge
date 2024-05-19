     <!-- Change Password Form -->
     <form method="post" action="{{ url('account/' . $usersProfile->id . '/updatePassword?_method=put') }}"
         id="form-submit-forgot">
         <div class="row mb-3">
             <label for="password" class="col-md-4 col-lg-3 col-form-label">Password
                 Sekarang</label>
             <div class="col-md-8 col-lg-9">
                 <x-input type="password" name="password" placeholder="Masukan password..." />
             </div>
         </div>

         <div class="row mb-3">
             <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password
                 Baru</label>
             <div class="col-md-8 col-lg-9">
                 <x-input type="password" name="password_new" placeholder="Masukan password baru..." />
             </div>
         </div>

         <div class="row mb-3">
             <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password
                 Baru</label>
             <div class="col-md-8 col-lg-9">
                 <x-input type="password" name="password_new_confirmation"
                     placeholder="Masukan password baru konfirmasi..." />
             </div>
         </div>
         <div class="text-center">
             <button type="submit" class="btn btn-primary" id="btn-submit-forgot">Ubah Password</button>
         </div>
     </form><!-- End Change Password Form -->
