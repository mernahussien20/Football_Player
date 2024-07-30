<!-- search modal -->
<div class="modal" id="SearchModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
      <div class="modal-content">
        <div class="modal-header gap-2">
          <div class="position-relative popup-search w-100">
            <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
            <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
          </div>
          <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="search-list">
               <p class="mb-1">Html Templates</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
               </div>
               <p class="mb-1 mt-3">Web Designe Company</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4' ></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
               </div>
               <p class="mb-1 mt-3">Software Development</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
               </div>
               <p class="mb-1 mt-3">Online Shoping Portals</p>
               <div class="list-group">
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                  <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
               </div>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- end search modal -->

<!-- Bootstrap JS -->
<script src="{{url('public/backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{url('public/backend/assets/js/jquery.min.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/chartjs/js/chart.js') }}"></script>
<script src="{{url('public/backend/assets/js/index.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>

	<!--app JS-->
	<script src="{{url('public/backend/assets/js/app.js') }}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#about' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#slider' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#instructors' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<!--app JS-->
//   <script>
// 		$(document).ready(function () {
// 			$('#image-uploadify').imageuploadify();
// 		})
//     </script>


    @yield('scripts')

<!--app JS-->

<script>
    new PerfectScrollbar(".app-container")
</script>
<script src="{{url('public/backend/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>


<script src="{{url('public/backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{url('public/backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>

<script src="{{url('public/backend/assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script src="{{url('public/backend/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
<script>
    $('#fancy-file-upload').FancyFileUpload({
        params: {
            action: 'fileuploader'
        },
        maxfilesize: 1000000
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#blog' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#book' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#slider' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function fetchFilteredData() {
            let birthyear = document.getElementById('inputBirthYear').value;
            let role = document.getElementById('inputRole').value;
            let governorate = document.getElementById('inputGovernorate').value;
            let branch = document.getElementById('inputBranch').value;

            fetch("{{ route('players.filter') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    birthyear: birthyear,
                    role: role,
                    governorate: governorate,
                    branch: branch
                })
            })
            .then(response => response.json())
            .then(data => {
                let tableBody = document.querySelector('table tbody');
                tableBody.innerHTML = '';
                data.players.forEach(player => {
                    let row = `<tr>
                        <td><a href="/players/${player.id}">${player.name}</a></td>
                        <td>${player.role.name}</td>
                        <td>${player.phone}</td>
                        <td>${player.governorate}</td>
                        <td>${player.birth.birthyear}</td>
                        <td>${player.branch.name}</td>
                        <td>${player.birthday}</td>
                        <td><img src="/players/${player.personal_image}" width="50" height="50" alt=""></td>
                        <td><img src="/players/${player.birth_image}" width="50" height="50" alt=""></td>
                        <td>
                            <a href="/players/${player.id}/edit"><i class="text-primary" data-feather="edit"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleDangerModal${player.id}"><i class="text-primary" data-feather="delete"></i></a>
                        </td>
                    </tr>`;
                    tableBody.innerHTML += row;
                });
                feather.replace(); // To reapply Feather icons
            });
        }

        document.querySelectorAll('select').forEach(select => {
            select.addEventListener('change', fetchFilteredData);
        });
    });
</script>



