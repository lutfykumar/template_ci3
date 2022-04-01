<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<title>Cosmo</title>
	<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?= base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<style>
		.btn.btn-primary {
			color: #fff;
			border-color: #eaad39;
			background-color: #eaa039;
		}

		.btn-check:active+.btn.btn-primary,
		.btn-check:checked+.btn.btn-primary,
		.btn.btn-primary.active,
		.btn.btn-primary.show,
		.btn.btn-primary:active:not(.btn-active),
		.btn.btn-primary:focus:not(.btn-active),
		.btn.btn-primary:hover:not(.btn-active),
		.show>.btn.btn-primary {
			color: #fff;
			border-color: #d05e14;
			background-color: #d05e14 !important;
		}

		.link-primary {
			color: #ea9339;
		}

		.link-primary:hover {
			color: #d05e14 !important;
		}
    
		.link-primary:focus,
		.link-primary:hover {
			color: #ea9339;
		}
	</style>
	<script>
		var ip_server = "<?= base_url(); ?>";
	</script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?= base_url(); ?>assets/media/illustrations/dozzy-1/14.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="../../demo4/dist/index.html" class="mb-12">
					<img alt="Logo" src="<?= base_url(); ?>assets/gambar/kokola.png" class="h-40px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Sign In to Admin</h1>
						</div>
						<!--begin::Heading-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Label-->
							<label class="form-label fs-6 fw-bolder text-dark">NIK</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="text" name="nik" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Input group-->
						<div class="fv-row mb-10">
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack mb-2">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<!--end::Label-->
								<!--begin::Link-->
								<a href="https://app.kokola.co.id/reset_password/" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
								<!--end::Link-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Input-->
							<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
							<!--end::Input-->
						</div>
						<!--end::Input group-->
						<!--begin::Actions-->
						<div class="text-center">
							<!--begin::Submit button-->
							<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
								<span class="indicator-label">Login</span>
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<!--end::Submit button-->
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-column-auto">
				<!--begin::Links-->
				<div class="d-flex align-items-center fw-bold fs-6">
					<a href="https://kokola.co.id" class="text-muted text-hover-primary px-2">© 2022 kokola, E-Apps Department</a>
				</div>
				<!--end::Links-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Main-->
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?= base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?= base_url(); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<!-- <script src="<?= base_url(); ?>assets/js/custom/authentication/sign-in/general.js"></script> -->
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->

	<script>
		$(document).ready(function() {
			// Define form element
			const form = document.getElementById('kt_sign_in_form');
			// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
			var validator = FormValidation.formValidation(
				form, {
					fields: {
						'nik': {
							validators: {
								notEmpty: {
									message: 'Nik belum diiisi'
								}
							}
						},
						'password': {
							validators: {
								notEmpty: {
									message: 'Password belum diiisi'
								}
							}
						},
					},
					plugins: {
						trigger: new FormValidation.plugins.Trigger(),
						bootstrap: new FormValidation.plugins.Bootstrap5({
							rowSelector: '.fv-row',
							eleInvalidClass: '',
							eleValidClass: ''
						})
					}
				}
			);

			// Submit button handler
			const submitButton = document.getElementById('kt_sign_in_form');
			submitButton.addEventListener('click', function(e) {
				// Prevent default button action
				e.preventDefault();
				// Validate form before submit
				if (validator) {
					validator.validate().then(function(status) {
						console.log('validated!');

						if (status == 'Valid') {
							// Show loading indication
							submitButton.setAttribute('data-kt-indicator', 'on');
							var form_login = $("#kt_sign_in_form");
								var formnya = form_login[0];
								var data_login = new FormData(formnya);
								$.ajax({
									url: ip_server + "login/login/",
									type: "POST",
									data: data_login,
									dataType: "json",
									contentType: false,
									cache: false,
									processData: false,
									success: function(out) {
										if (out.sts == "true") {
											window.location.href = ip_server + 'dashboard/';
										} else {
											Swal.fire({
												text: "Username dan Password Anda salah",
												icon: "error",
												buttonsStyling: false,
												confirmButtonText: "Coba kembali",
												customClass: {
													confirmButton: "btn btn-danger"
												}
											});
											submitButton.disabled = true;
										}
									},
									error: function() {
									}
								});
						}
					});
				}
			});

			// $("[name=password]").on('keyup', function(e) {
			// 	if (e.keyCode == 13) {
			// 		$("#kt_sign_in_submit").trigger("click");
			// 	}
			// });

		});
	</script>
</body>
<!--end::Body-->

</html>