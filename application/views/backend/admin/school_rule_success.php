<span style="background-color: #5949fe;color: #ffffff;font-size: x-small;">UI No: FAMS2321 | Application Rule Study Complete</span> <!-- UI Number -->
<script type="text/javascript">
	document.getElementById('learn_page').style = 'background-color: #7467f0;color: white;';
</script>

<div class="container-xxl flex-grow-1 container-p-y">

	<div class="row">
		<div class="col-md-3">
			<h6 class="fw-bold py-3 ms-4"><span><?= get_phrase('Learn before Use') ?> |</span><span class="purple-text" style=" color: #7467f0; "> <?= get_phrase('School Rule') ?></span></h6>
		</div>
		<div class="col-md-9" style="text-align: right;"></div>
	</div>

	<!-- Header -->

	<div class="row">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3"> <img src="<?php echo base_url('assets/img/success.gif'); ?>" width="100%" />
						</div>
						<div class="col-md-9 answer">
							<div class="row g-3">
								<div class="col-md-12">
									<H6><?= get_phrase('Congradualations') ?>! </H6>
									<p><?= get_phrase('Success_note') ?></p>
									<p><?= get_phrase('success-rule') ?></p>
								</div>
								<div>
									<a href="<?php echo base_url('user/student'); ?>" class="btn btn-secondary waves-effect waves-light" role="button" aria-pressed="true"><?= get_phrase('view_student_list') ?></a>
									<a type="button" class="btn btn-primary waves-effect waves-light" href="/user/student/add/"><?= get_phrase('Add new Student') ?></a>
								</div>
							</div>
						</div>

					</div>


				</div> <!-- end card -->
			</div><!-- end col-->
		</div>

	</div>


	<!-- Header -->