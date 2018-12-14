var menuBtn = document.getElementsByClassName('menu-btn')
var mobileMenu = document.getElementsByClassName('mobile-menu')
var clickedBtn = function() {
  mobileMenu[0].classList.toggle('active')
}

menuBtn[0].addEventListener('click', clickedBtn)

console.log(menuBtn[0])

/* --------------- TESTIMONIALS ----------------- */

import { html, render } from 'https://unpkg.com/lit-html?module';

let postData = [];
let postImages = [];

// https://github.com/axios/axios
axios.get('wp-json/wp/v2/testimonials')
	.then((response) => {
		// console.log(response.data)
		postData = response.data;
		// loop over posts, snag IDs
		postData.map((item) => {
			// console.log(item.id);

			// IDs used to snag images
			return axios.get(`http://localhost:8888/wp-json/wp/v2/media?parent=${item.id}`)
				.then((res) => {
					// console.log(res.data)
					let imageLookup = res.data;
					imageLookup.map((item) => {
						postImages.push({
							id: item.id,
							image: item.media_details.sizes.medium.source_url
						});
						console.log(postImages);
					})
				})
				// to catch error of 2nd call
				.catch((err) => {
					console.error(err)
				})
		})	
	})
	// to catch error of 1st call
	.catch((err) => {
		console.error(err)
	})