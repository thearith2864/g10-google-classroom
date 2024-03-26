<?php
if (!isset($_SESSION['user'])) {
	header('Location: /signup');
	exit();
}
require("models/teacher.model.php");
?>
<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main Banner START -->
	<section class="position-relative overflow-hidden pt-5 pt-lg-3">
		<!-- SVG START -->
		<figure class="position-absolute top-50 start-0 translate-middle-y ms-n7 d-none d-xxl-block">
			<svg class="rotate-74 fill-danger opacity-1">
				<circle cx="180.4" cy="15.5" r="7.7" />
				<path d="m159.9 22.4c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<ellipse transform="matrix(.3862 -.9224 .9224 .3862 71.25 138.08)" cx="139.4" cy="15.5" rx="6.1" ry="6.1" />
				<circle cx="118.9" cy="15.5" r="5.4" />
				<path d="m98.4 20.1c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
				<path d="m77.9 19.3c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
				<path d="m57.3 18.6c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 17.8c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="15.5" r="1.6" />
				<circle cx="180.4" cy="38.5" r="7.7" />
				<path d="m159.9 45.3c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<ellipse transform="matrix(.8486 -.5291 .5291 .8486 .7599 79.566)" cx="139.4" cy="38.5" rx="6.1" ry="6.1" />
				<circle cx="118.9" cy="38.5" r="5.4" />
				<path d="m98.4 43.1c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
				<circle cx="77.9" cy="38.5" r="3.8" />
				<path d="m57.3 41.5c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1c0 1.8-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 40.8c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="38.5" r="1.6" />
				<circle cx="180.4" cy="61.4" r="7.7" />
				<path d="m159.9 68.3c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<ellipse transform="matrix(.3862 -.9224 .9224 .3862 28.902 166.26)" cx="139.4" cy="61.4" rx="6.1" ry="6.1" />
				<circle cx="118.9" cy="61.4" r="5.4" />
				<path d="m98.4 66c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6c0 2.6-2.1 4.6-4.6 4.6z" />
				<path d="m77.9 65.2c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
				<path d="m57.3 64.5c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 63.7c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="61.4" r="1.6" />
				<circle cx="180.4" cy="84.4" r="7.7" />
				<path d="m159.9 91.3c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<path d="m139.4 90.5c-3.4 0-6.1-2.7-6.1-6.1s2.7-6.1 6.1-6.1 6.1 2.7 6.1 6.1c0 3.3-2.7 6.1-6.1 6.1z" />
				<circle cx="118.9" cy="84.4" r="5.4" />
				<path d="m98.4 89c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
				<path d="m77.9 88.2c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
				<path d="m57.3 87.4c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1c0 1.8-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 86.7c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="84.4" r="1.6" />
				<circle cx="180.4" cy="107.3" r="7.7" />
				<path d="m159.9 114.2c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<path d="m139.4 113.4c-3.4 0-6.1-2.7-6.1-6.1s2.7-6.1 6.1-6.1 6.1 2.7 6.1 6.1-2.7 6.1-6.1 6.1z" />
				<circle cx="118.9" cy="107.3" r="5.4" />
				<path d="m98.4 111.9c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6c0 2.6-2.1 4.6-4.6 4.6z" />
				<path d="m77.9 111.2c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
				<path d="m57.3 110.4c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 109.6c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3c0.1 1.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="107.3" r="1.6" />
				<circle cx="180.4" cy="130.3" r="7.7" />
				<path d="m159.9 137.2c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<ellipse transform="matrix(.3862 -.9224 .9224 .3862 -34.62 208.52)" cx="139.4" cy="130.3" rx="6.1" ry="6.1" />
				<circle cx="118.9" cy="130.3" r="5.4" />
				<path d="m98.4 134.9c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
				<path d="m77.9 134.1c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
				<path d="m57.3 133.4c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 132.6c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="130.3" r="1.6" />
				<circle cx="180.4" cy="153.2" r="7.7" />
				<path d="m159.9 160.1c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<ellipse transform="matrix(.3862 -.9224 .9224 .3862 -55.794 222.61)" cx="139.4" cy="153.2" rx="6.1" ry="6.1" />
				<circle cx="118.9" cy="153.2" r="5.4" />
				<path d="m98.4 157.8c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6c0 2.6-2.1 4.6-4.6 4.6z" />
				<circle cx="77.9" cy="153.2" r="3.8" />
				<path d="m57.3 156.3c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 155.5c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="153.2" r="1.6" />
				<circle cx="180.4" cy="176.2" r="7.7" />
				<path d="m159.9 183.1c-3.8 0-6.9-3.1-6.9-6.9s3.1-6.9 6.9-6.9 6.9 3.1 6.9 6.9-3.1 6.9-6.9 6.9z" />
				<ellipse transform="matrix(.3862 -.9224 .9224 .3862 -76.968 236.7)" cx="139.4" cy="176.2" rx="6.1" ry="6.1" />
				<circle cx="118.9" cy="176.2" r="5.4" />
				<path d="m98.4 180.8c-2.5 0-4.6-2.1-4.6-4.6s2.1-4.6 4.6-4.6 4.6 2.1 4.6 4.6-2.1 4.6-4.6 4.6z" />
				<path d="m77.9 180c-2.1 0-3.8-1.7-3.8-3.8s1.7-3.8 3.8-3.8 3.8 1.7 3.8 3.8-1.7 3.8-3.8 3.8z" />
				<path d="m57.3 179.3c-1.7 0-3.1-1.4-3.1-3.1s1.4-3.1 3.1-3.1 3.1 1.4 3.1 3.1-1.4 3.1-3.1 3.1z" />
				<path d="m36.8 178.5c-1.3 0-2.3-1-2.3-2.3s1-2.3 2.3-2.3 2.3 1 2.3 2.3-1 2.3-2.3 2.3z" />
				<circle cx="16.3" cy="176.2" r="1.6" />
			</svg>
		</figure>
		<!-- SVG END -->

		<!-- SVG START -->
		<span class="position-absolute top-50 end-0 translate-middle-y mt-5 me-n5 d-none d-xxl-inline-flex">
			<svg class="fill-warning rotate-186 opacity-8">
				<path d="m35.4 54.2c0 0.6 0 1.1-0.1 1.7-0.9 9.3-9.2 16.1-18.5 15.1-4.5-0.4-8.5-2.6-11.4-6.1-2.8-3.5-4.2-7.9-3.7-12.4 0.9-9.3 9.2-16.1 18.5-15.1 4.5 0.4 8.5 2.6 11.4 6.1 2.4 3 3.8 6.8 3.8 10.7zm-33.4 0c0 3.8 1.3 7.5 3.8 10.4 2.8 3.4 6.8 5.5 11.2 6 9.1 0.9 17.2-5.8 18.1-14.8 0.4-4.4-0.9-8.7-3.7-12.1s-6.8-5.5-11.2-6c-9.2-0.8-17.3 5.8-18.2 14.9v1.6z" />
				<path d="m39 54.1c0 1.1-0.1 2.2-0.3 3.3-1.8 9.8-11.2 16.2-21 14.4-4.7-0.8-8.8-3.5-11.5-7.4-2.7-4-3.7-8.7-2.8-13.5 1.8-9.8 11.2-16.2 21-14.4 4.7 0.9 8.8 3.6 11.5 7.5 2.1 3 3.1 6.6 3.1 10.1zm-35.6 0.1c0 3.5 1.1 7 3.1 9.9 2.7 3.9 6.7 6.5 11.3 7.4 9.6 1.8 18.8-4.5 20.6-14.1 0.9-4.6-0.1-9.3-2.8-13.2s-6.7-6.5-11.3-7.4c-9.6-1.8-18.8 4.5-20.6 14.1-0.2 1.1-0.3 2.2-0.3 3.3z" />
				<path d="m42.8 54.2c0 1.7-0.2 3.3-0.7 5-2.7 10.2-13.3 16.3-23.5 13.6-5-1.3-9.1-4.5-11.7-8.9-2.5-4.5-3.2-9.7-1.9-14.7 2.7-10.2 13.3-16.3 23.5-13.6 5 1.3 9.1 4.5 11.7 8.9 1.7 3 2.6 6.3 2.6 9.7zm-38.1 0c0 3.3 0.9 6.5 2.5 9.4 2.5 4.4 6.6 7.5 11.5 8.8 10 2.7 20.4-3.3 23.1-13.4 1.3-4.9 0.6-9.9-1.9-14.3s-6.6-7.5-11.5-8.8c-10-2.6-20.4 3.4-23 13.4-0.5 1.6-0.7 3.3-0.7 4.9z" />
				<path d="m46.7 54.2c0 2.2-0.4 4.5-1.1 6.6-3.6 10.7-15.3 16.5-26.1 12.8-5.2-1.8-9.4-5.4-11.8-10.4-2.4-4.9-2.8-10.5-1-15.7 3.6-10.6 15.3-16.4 26-12.8l-0.1 0.2 0.1-0.2c5.2 1.8 9.4 5.4 11.8 10.4 1.5 2.9 2.2 6 2.2 9.1zm-40.8 0c0 3.1 0.7 6.1 2.1 8.9 2.4 4.8 6.5 8.4 11.6 10.2 10.5 3.6 22-2.1 25.6-12.6 1.7-5.1 1.4-10.6-1-15.4s-6.5-8.4-11.6-10.2c-10.5-3.6-22 2.1-25.6 12.6-0.7 2.1-1.1 4.3-1.1 6.5z" />
				<path d="m50.7 54.2c0 2.8-0.5 5.6-1.6 8.2-4.5 11.2-17.4 16.6-28.6 12.1-5.4-2.2-9.7-6.4-12-11.8s-2.3-11.4-0.1-16.8c4.5-11.2 17.4-16.6 28.6-12.1 5.4 2.2 9.7 6.4 12 11.8 1.1 2.8 1.7 5.7 1.7 8.6zm-43.6 0c0 2.8 0.6 5.7 1.7 8.4 2.2 5.3 6.4 9.4 11.8 11.6 11 4.5 23.6-0.9 28.1-11.9 2.2-5.3 2.1-11.2-0.1-16.5s-6.4-9.4-11.8-11.6c-11-4.5-23.6 0.9-28.1 11.9-1.1 2.6-1.6 5.3-1.6 8.1z" />
				<path d="m54.7 54.2c0 3.4-0.7 6.7-2.2 9.9-5.5 11.7-19.5 16.7-31.2 11.3-5.7-2.6-10-7.3-12.1-13.2s-1.8-12.2 0.8-17.9c5.5-11.7 19.4-16.8 31.1-11.3 5.7 2.6 10 7.3 12.1 13.2 1 2.6 1.5 5.3 1.5 8zm-46.5 0c0 2.7 0.5 5.3 1.4 7.9 2.1 5.8 6.3 10.4 11.9 13 11.5 5.4 25.3 0.4 30.6-11.1 2.6-5.6 2.9-11.8 0.8-17.6s-6.3-10.4-11.9-13l0.1-0.2-0.1 0.1c-11.5-5.4-25.3-0.4-30.6 11.1-1.5 3.1-2.2 6.5-2.2 9.8z" />
				<path d="m58.7 54.2c0 4-1 7.9-2.8 11.5-6.4 12.2-21.5 16.9-33.6 10.6-6-3.1-10.3-8.3-12.3-14.6s-1.4-13.1 1.7-19c6.3-12.2 21.4-17 33.6-10.6 5.9 3.1 10.3 8.3 12.3 14.6 0.8 2.5 1.1 5 1.1 7.5zm-49.5 0c0 2.5 0.4 5 1.1 7.4 2 6.3 6.3 11.4 12.1 14.4 12 6.3 26.9 1.6 33.1-10.4 3-5.8 3.6-12.5 1.7-18.7-2-6.3-6.3-11.4-12.1-14.4-12-6.3-26.9-1.6-33.1 10.4-1.9 3.5-2.8 7.4-2.8 11.3z" />
				<path d="m62.9 54.2c0 4.6-1.2 9.1-3.5 13.1-7.3 12.7-23.6 17.1-36.2 9.9-6.1-3.5-10.5-9.2-12.4-16s-0.9-14 2.6-20.1c7.3-12.7 23.5-17.1 36.2-9.8l-0.1 0.2 0.1-0.2c6.1 3.5 10.5 9.2 12.4 16 0.5 2.3 0.9 4.6 0.9 6.9zm-52.7-0.1c0 2.3 0.3 4.6 0.9 6.9 1.8 6.7 6.2 12.3 12.2 15.8 12.5 7.2 28.5 2.9 35.7-9.6 3.5-6.1 4.4-13.1 2.5-19.8-1.8-6.7-6.2-12.3-12.2-15.8-12.5-7.2-28.5-2.8-35.7 9.7-2.2 3.9-3.4 8.3-3.4 12.8z" />
				<path d="m67 54.2c0 5.2-1.4 10.3-4.2 14.8-8.2 13.2-25.5 17.2-38.7 9-6.4-4-10.8-10.2-12.5-17.5s-0.5-14.8 3.5-21.2c8.2-13.2 25.5-17.2 38.7-9 6.4 4 10.8 10.2 12.5 17.5 0.5 2.1 0.7 4.3 0.7 6.4zm-55.9-0.1c0 2.1 0.2 4.3 0.7 6.4 1.7 7.2 6.1 13.3 12.4 17.2 13 8.1 30.1 4.1 38.2-8.9 3.9-6.3 5.1-13.7 3.4-20.9s-6.1-13.3-12.4-17.2c-13-8.1-30.1-4.1-38.2 8.9-2.6 4.4-4.1 9.4-4.1 14.5z" />
				<path d="m71.2 54.2c0 5.8-1.7 11.5-5 16.4-9.1 13.7-27.6 17.4-41.2 8.3-6.6-4.4-11.1-11.1-12.7-18.9s0-15.7 4.4-22.3c9.1-13.6 27.6-17.4 41.2-8.3 6.6 4.4 11.1 11.1 12.7 18.9 0.4 2 0.6 4 0.6 5.9zm-59.1-0.1c0 1.9 0.2 3.9 0.6 5.9 1.5 7.7 6 14.3 12.5 18.6 13.5 9 31.7 5.3 40.7-8.2 4.3-6.5 5.9-14.4 4.3-22-1.5-7.7-6-14.3-12.5-18.6-13.5-9-31.7-5.3-40.7 8.2-3.3 4.8-4.9 10.4-4.9 16.1z" />
				<path d="m75.4 54.3c0 6.4-2 12.7-5.8 18-10 14.1-29.6 17.5-43.7 7.5-6.9-4.8-11.4-12-12.8-20.3s0.5-16.6 5.3-23.4c9.9-14.1 29.6-17.5 43.7-7.5 6.8 4.8 11.4 12 12.8 20.3 0.3 1.8 0.5 3.6 0.5 5.4zm-62.4-0.2c0 1.8 0.2 3.6 0.5 5.3 1.4 8.2 5.9 15.3 12.7 20.1 14 9.9 33.4 6.5 43.2-7.4 4.8-6.8 6.6-15 5.2-23.1-1.4-8.2-5.9-15.3-12.7-20.1-14-9.9-33.4-6.5-43.2 7.4-3.8 5.3-5.7 11.5-5.7 17.8z" />
				<path d="m79.6 54.3c0 7.1-2.3 13.9-6.5 19.7-10.9 14.6-31.6 17.7-46.3 6.8-7.1-5.3-11.7-13-13-21.7s0.9-17.4 6.2-24.5c10.9-14.6 31.6-17.7 46.3-6.8 7.1 5.3 11.7 13 13 21.7 0.2 1.5 0.3 3.1 0.3 4.8zm-65.8-0.2c0 1.6 0.1 3.2 0.4 4.8 1.3 8.7 5.8 16.3 12.8 21.5 14.5 10.8 35 7.7 45.7-6.7 5.2-7 7.4-15.6 6.1-24.2s-5.8-16.3-12.8-21.5l0.1-0.1v0.1c-14.5-10.8-35-7.7-45.7 6.7-4.3 5.7-6.6 12.4-6.6 19.4z" />
				<path d="m83.9 54.3c0 7.7-2.5 15.1-7.4 21.3-11.8 15.1-33.7 17.8-48.8 6-7.3-5.7-12-13.9-13.1-23.1s1.4-18.3 7.1-25.6c11.8-15.1 33.7-17.8 48.8-6 7.3 5.7 12 13.9 13.1 23.1 0.2 1.4 0.3 2.8 0.3 4.3zm-69.2-0.2c0 1.4 0.1 2.9 0.3 4.3 1.1 9.1 5.7 17.2 13 22.9 15 11.7 36.6 9 48.3-6 5.7-7.2 8.1-16.2 7-25.4-1.1-9.1-5.7-17.2-13-22.9-15-11.7-36.6-9-48.3 6-4.8 6.1-7.3 13.5-7.3 21.1z" />
				<path d="m88.1 54.3c0 8.3-2.8 16.4-8.2 22.9-12.7 15.6-35.7 18-51.3 5.3-7.6-6.1-12.3-14.9-13.3-24.5-1-9.7 1.8-19.2 8-26.7 12.7-15.6 35.7-18 51.3-5.3 7.6 6.1 12.3 14.9 13.3 24.5 0.2 1.2 0.2 2.5 0.2 3.8zm-72.6-0.2c0 1.2 0.1 2.5 0.2 3.8 1 9.6 5.6 18.2 13.1 24.3 15.5 12.5 38.3 10.2 50.9-5.2 6.1-7.5 8.9-16.9 7.9-26.5s-5.6-18.2-13.1-24.3c-15.5-12.6-38.3-10.2-50.9 5.2-5.2 6.5-8.1 14.5-8.1 22.7z" />
				<path d="m92.4 54.2c0 9-3.1 17.6-9 24.6-13.6 16.1-37.7 18.1-53.8 4.5-7.8-6.6-12.6-15.8-13.4-26-0.9-10.2 2.3-20 8.9-27.8 13.5-16 37.7-18.1 53.8-4.5 7.8 6.6 12.6 15.8 13.4 26 0.1 1.1 0.1 2.2 0.1 3.2zm-76-0.1c0 1.1 0 2.1 0.1 3.2 0.8 10.1 5.6 19.2 13.3 25.7 15.9 13.5 39.8 11.4 53.3-4.5 6.5-7.7 9.7-17.5 8.8-27.6-0.8-9.9-5.6-19.1-13.3-25.6-15.9-13.5-39.8-11.4-53.3 4.5-5.8 6.9-8.9 15.4-8.9 24.3z" />
				<path d="m96.7 54.2c0 9.7-3.5 18.9-9.9 26.2-14.5 16.6-39.8 18.3-56.3 3.8-8-7-12.8-16.7-13.6-27.4-0.7-10.6 2.8-20.9 9.8-28.9 14.5-16.6 39.8-18.2 56.3-3.8l-0.1 0.1 0.1-0.1c8 7 12.8 16.7 13.6 27.4 0.1 0.9 0.1 1.8 0.1 2.7zm-79.5-0.1c0 0.9 0 1.8 0.1 2.7 0.7 10.6 5.4 20.2 13.4 27.1 16.4 14.4 41.5 12.7 55.8-3.7 7-7.9 10.4-18.1 9.7-28.7-0.7-10.5-5.4-20.1-13.4-27.1-16.4-14.3-41.5-12.7-55.8 3.8-6.4 7.2-9.8 16.4-9.8 25.9z" />
				<path d="m101 54.2c0 10.3-3.8 20.1-10.7 27.9-15.4 17.1-41.8 18.4-58.9 3-8.3-7.5-13.1-17.7-13.7-28.8s3.2-21.8 10.7-30c15.4-17.1 41.8-18.4 58.9-3 8.3 7.5 13.1 17.7 13.7 28.8v2.1zm-83-0.1c0 0.7 0 1.4 0.1 2.2 0.6 11 5.4 21.1 13.6 28.5 16.9 15.3 43.1 13.9 58.4-3 7.4-8.2 11.2-18.8 10.6-29.8s-5.4-21.1-13.6-28.5c-16.9-15.3-43.1-13.9-58.4 3-7 7.7-10.7 17.4-10.7 27.6z" />
				<path d="m105.3 54.2c0 11-4.1 21.4-11.6 29.5-16.3 17.5-43.9 18.6-61.4 2.3-8.5-7.9-13.4-18.6-13.8-30.2-0.5-11.6 3.6-22.7 11.5-31.2 16.3-17.5 43.9-18.5 61.4-2.2 8.5 7.9 13.4 18.6 13.8 30.2 0.1 0.5 0.1 1.1 0.1 1.6zm-86.5-0.1v1.6c0.4 11.5 5.3 22.1 13.7 30 17.4 16.2 44.7 15.2 60.9-2.2 7.8-8.4 11.9-19.4 11.5-30.9s-5.3-22.1-13.7-30l0.1-0.1-0.1 0.1c-17.4-16.1-44.7-15.1-60.9 2.3-7.5 8-11.5 18.3-11.5 29.2z" />
				<path d="m109.6 54.2c0 11.7-4.4 22.7-12.5 31.2-17.2 18-45.9 18.7-63.9 1.5-8.7-8.3-13.7-19.6-14-31.6-0.3-12.1 4.2-23.6 12.5-32.3 17.2-18 45.9-18.7 63.9-1.5 8.7 8.3 13.7 19.6 14 31.6v1.1zm-90 0v1.1c0.3 12 5.2 23.1 13.9 31.4 17.9 17.1 46.3 16.4 63.4-1.5 8.3-8.7 12.7-20 12.4-32s-5.3-23.2-13.9-31.4c-17.9-17.1-46.4-16.4-63.4 1.5-8.1 8.4-12.4 19.3-12.4 30.9z" />
				<path d="m113.9 54.2c0 12.3-4.7 24-13.4 32.8-18.1 18.5-47.9 18.9-66.4 0.8-9-8.8-14-20.5-14.1-33-0.2-12.5 4.6-24.4 13.4-33.4 18.1-18.6 47.9-18.9 66.4-0.8l-0.1 0.1 0.1-0.1c9 8.8 14 20.5 14.1 33v0.6zm-93.6 0v0.5c0.1 12.4 5.1 24.1 14 32.8 18.4 18 48 17.6 65.9-0.7 8.7-8.9 13.4-20.7 13.3-33.1s-5.1-24.1-14-32.8c-18.4-18-48-17.6-65.9 0.7-8.6 8.8-13.3 20.3-13.3 32.6z" />
				<path d="m118.3 54.2c0 13-5.1 25.3-14.3 34.5-19 19-50 19-69 0-9.2-9.2-14.3-21.4-14.3-34.5 0-13 5.1-25.3 14.3-34.5 19-19 50-19 69 0l-0.1 0.1 0.1-0.1c9.2 9.2 14.3 21.5 14.3 34.5zm-97.2 0c0 12.9 5 25.1 14.2 34.2 18.9 18.9 49.6 18.9 68.4 0 9.1-9.1 14.2-21.3 14.2-34.2s-5-25.1-14.2-34.2c-18.8-18.9-49.5-18.9-68.4 0-9.2 9.1-14.2 21.3-14.2 34.2z" />
			</svg>
		</span>
		<!-- SVG END -->

		<!-- SVG START -->
		<figure class="position-absolute top-0 start-0 ms-5">
			<svg class="fill-orange opacity-4" width="29px" height="29px">
				<path d="M29.004,14.502 C29.004,22.512 22.511,29.004 14.502,29.004 C6.492,29.004 -0.001,22.512 -0.001,14.502 C-0.001,6.492 6.492,-0.001 14.502,-0.001 C22.511,-0.001 29.004,6.492 29.004,14.502 Z"></path>
			</svg>
		</figure>
		<!-- SVG END -->


		</div>
		<!-- Content END -->
	</section>
	<!-- =======================
Main Banner END -->

	<!-- =======================
Counter START -->
	<section class="py-0 py-xl-5">
		<div class="container">
			<div class="row g-4">
				<!-- Counter item -->
				<div class="col-sm-6 col-xl-3">
					<div class="d-flex justify-content-center align-items-center p-4 bg-warning bg-opacity-15 rounded-3">
						<span class="display-6 lh-1 text-warning mb-0"><i class="fas fa-tv"></i></span>
						<div class="ms-4 h6 fw-normal">
							<div class="d-flex">
								<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo countClass() ?>" data-purecounter-delay="200"></h5>
								<span class="mb-0 h5"> +</span>
							</div>
							<p class="mb-0">Online Courses</p>
						</div>
					</div>
				</div>
				<!-- Counter item -->
				<div class="col-sm-6 col-xl-3">
					<div class="d-flex justify-content-center align-items-center p-4 bg-blue bg-opacity-10 rounded-3">
						<span class="display-6 lh-1 text-blue mb-0"><i class="fas fa-user-tie"></i></span>
						<div class="ms-4 h6 fw-normal">
							<div class="d-flex">
								<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo countUsers() ?>" data-purecounter-delay="200">0</h5>
								
							</div>
							<p class="mb-0">Expert Tutors</p>
						</div>
					</div>
				</div>
				<!-- Counter item -->
				<div class="col-sm-6 col-xl-3">
					<div class="d-flex justify-content-center align-items-center p-4 bg-purple bg-opacity-10 rounded-3">
						<span class="display-6 lh-1 text-purple mb-0"><i class="fas fa-user-graduate"></i></span>
						<div class="ms-4 h6 fw-normal">
							<div class="d-flex">
								<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo countUsers() ?>" data-purecounter-delay="200"></h5>
								
							</div>
							<p class="mb-0">Online Students</p>
						</div>
					</div>
				</div>
				<!-- Counter item -->
				<div class="col-sm-6 col-xl-3">
					<div class="d-flex justify-content-center align-items-center p-4 bg-info bg-opacity-10 rounded-3">
						<span class="display-6 lh-1 text-info mb-0"><i class="bi bi-patch-check-fill"></i></span>
						<div class="ms-4 h6 fw-normal">
							<div class="d-flex">
								<h5 class="purecounter mb-0 fw-bold" data-purecounter-start="0" data-purecounter-end="<?php echo countClass() ?> " data-purecounter-delay="300">0</h5>
								<span class="mb-0 h5"> +</span>
							</div>
							<p class="mb-0">Certified Courses</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Counter END -->

	<!-- =======================
Popular course START -->
	<section>
		<div class="container">
			<!-- Title -->
			<div class="row mb-4">
				<div class="col-lg-8 mx-auto text-center">
					<h2 class="fs-1">All of Classroom</h2>
					<p class="mb-0">Here are all of the classrooms including your classroom and the classrooms that you have joined</p>
				</div>
			</div>

			<!-- Tabs START -->
			<ul class="nav nav-pills nav-pills-bg-soft justify-content-sm-center mb-4 px-3" id="course-pills-tab" role="tablist">

				<!-- Tab item -->
				<li class="nav-item me-5 me-sm-5 mr-5">
					<button class="nav-link  mb-2 mb-md-0 active" id="course-pills-tab-1" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-1" type="button" role="tab" aria-controls="course-pills-tabs-1" aria-selected="false">Your classes</button>
				</li>
				<!-- Tab item -->
				<li class="nav-item me-1 me-sm-5 ml-5">
					<button class="nav-link mb-2 mb-md-0" id="course-pills-tab-2" data-bs-toggle="pill" data-bs-target="#course-pills-tabs-2" type="button" role="tab" aria-controls="course-pills-tabs-2" aria-selected="false">Enrolled</button>
				</li>

			</ul>
			<!-- Tabs END -->

			<!-- Tabs content START -->
			<div class="tab-content" id="course-pills-tabContent">
				<!-- Content START -->
				<div class="tab-pane fade show active" id="course-pills-tabs-1" role="tabpanel" aria-labelledby="course-pills-tab-1">
					<div class="row g-4">
						<?php
						if (is_array($classes)) :
							foreach ($classes as $class) :


						?>

								<!-- Card item START -->

								<div class="col-sm-6 col-lg-4 col-xl-3" id="classCard">
									<a href="/class?id=<?= $class['classroom_code'] ?>">
										<div class="card shadow h-100">
											<!-- Image -->
											<img src="assets/images/courses/4by3/08.jpg" class="card-img-top" alt="course image">
											<div class="d-flex align-items-center">
												<?php
												foreach ($teacher as $select) {
													// print_r($select['classroom_code']);

													if ($select['classroom_code'] == $class['classroom_code']) {
												?>
														<img src="../../assets/images/profiles/<?= $select['image_url'] ?>" alt="" style="margin-top: -40px; height: 80px; width:80px; margin-left: 10px; " class="shadow-lg rounded-circle">
														<h5 style="margin-left: 10px;"><?= $select['user_name'] ?></h5>
												<?Php
													}
												}
												?>
											</div>
											<!-- Card body -->
											<div class="card-body pb-0">
												<!-- Badge and favorite -->
												<div class="d-flex justify-content-between ">

													<p>All level</p>
													<i class="far fa-heart"></i>
												</div>
												<!-- Title -->
												<h5 class="card-title fw-normal text-primary" id='className' style="font-size: 18px; ">Class: <?php echo $class['classroom_name'] ?></h5>
												<p class="mb-2 text-truncate-2" style="font-size: 16px;">Subject: <?php echo $class['subject'] ?></p>
												<p class="mb-1 text-truncate-2" style="font-size: 16px;">Room: <?php echo $class['room'] ?></p>

											</div>
											<!-- Card footer -->
											<div class="card-footer pt-0 ">
												<hr>
												<div class="d-flex justify-content-between">
													<form action="../../controllers/archived_classroom_controller/archived_classroom_controller.php" method="post">
													<input type="hidden" name="classroom_code" value="<?php echo $class['classroom_code'] ; ?>">
														<button type="submit" name="archive" class="btn p-0 m-0"><i class="bi bi-archive-fill text-primary fa-2x"></i></button>
													</form>
													
												</div>
											</div>
										</div>
									</a>
								</div>
								<!-- Card item END -->
						<?php
							endforeach;
						endif;
						?>


					</div> <!-- Row END -->
				</div>
				<!-- Content END -->

				<!-- Content START -->
				<div class="tab-pane fade" id="course-pills-tabs-2" role="tabpanel" aria-labelledby="course-pills-tab-2">
					<div class="row g-4">
						<!-- Card item START -->

						<?php
						if (is_array($join_classes)) :
							foreach ($join_classes as $class) :
						?>

								<!-- Card item START -->
								<div class="col-sm-6 col-lg-4 col-xl-3">
									<a href="/student_classwork?id=<?= $class['classroom_code'] ?>">
										<div class="card shadow h-100">
										<div class="card shadow h-100">
											<!-- Image -->
											<img src="assets/images/courses/4by3/08.jpg" class="card-img-top" alt="course image">
											<div class="d-flex align-items-center">
												<?php
												foreach ($teacher as $select) {
													// print_r($select['classroom_code']);

													if ($select['classroom_code'] == $class['classroom_code']) {
												?>
														<img src="../../assets/images/profiles/<?= $select['image_url'] ?>" alt="" style="margin-top: -40px; height: 80px; width:80px; margin-left: 10px; " class="shadow-lg rounded-circle">
														<h5 style="margin-left: 10px;"><?= $select['user_name'] ?></h5>
												<?Php
													}
												}
												?>
											</div>
											<!-- Card body -->
											<div class="card-body pb-0">
												<!-- Badge and favorite -->
												<div class="d-flex justify-content-between ">

													<p>All level</p>
													<i class="far fa-heart"></i>
												</div>
												<!-- Title -->
												<h5 class="card-title fw-normal text-primary" id='className' style="font-size: 18px; ">Class: <?php echo $class['classroom_name'] ?></h5>
												<p class="mb-2 text-truncate-2" style="font-size: 16px;">Subject: <?php echo $class['subject'] ?></p>
												<p class="mb-1 text-truncate-2" style="font-size: 16px;">Room: <?php echo $class['room'] ?></p>

											</div>
											<!-- Card footer -->
											<!-- Card footer -->
											<div class="card-footer pt-0 pb-3">
												<hr>
												<div class="d-flex justify-content-between">
													<span class="h6 fw-light mb-0"><i class="far fa-clock text-danger me-2"></i>12h 56m</span>
													<span class="h6 fw-light mb-0"><i class="fas fa-table text-orange me-2"></i>15 lectures</span>
												</div>
											</div>
											
										</div>
											
										
									</a>
								</div>
								<!-- Card item END -->
						<?php
							endforeach;
						endif;
						?>

					</div>
				</div>
				<!-- Content END -->

				<!-- Content START -->
			</div>
			<!-- Tabs content END -->
		</div>
	</section>
	<!-- =======================
Popular course END -->

	<!-- =======================
Action box START -->
	<section class=" popup pt-0 pt-lg-5">
		<div class="container position-relative">
			<!-- SVG decoration START -->
			<figure class="position-absolute top-50 start-50 translate-middle ms-2">
				<svg>
					<path class="fill-white opacity-4" d="m496 22.999c0 10.493-8.506 18.999-18.999 18.999s-19-8.506-19-18.999 8.507-18.999 19-18.999 18.999 8.506 18.999 18.999z" />
					<path class="fill-white opacity-4" d="m775 102.5c0 5.799-4.701 10.5-10.5 10.5-5.798 0-10.499-4.701-10.499-10.5 0-5.798 4.701-10.499 10.499-10.499 5.799 0 10.5 4.701 10.5 10.499z" />
					<path class="fill-white opacity-4" d="m192 102c0 6.626-5.373 11.999-12 11.999s-11.999-5.373-11.999-11.999c0-6.628 5.372-12 11.999-12s12 5.372 12 12z" />
					<path class="fill-white opacity-4" d="m20.499 10.25c0 5.66-4.589 10.249-10.25 10.249-5.66 0-10.249-4.589-10.249-10.249-0-5.661 4.589-10.25 10.249-10.25 5.661-0 10.25 4.589 10.25 10.25z" />
				</svg>
			</figure>
			<!-- SVG decoration END -->


		</div>
	</section>

	<!-- =======================
Action box END -->
</main>
<?php
echo '<script src="views/home/searchClasses.view.js"></script>';

?>