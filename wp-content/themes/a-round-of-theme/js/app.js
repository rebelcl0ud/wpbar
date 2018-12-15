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
						// console.log(postImages);
						initApp(response);
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

	const initApp = (data) => {
		let testimonialsData = data.data;

		Array.prototype.swap = ((x,y) => {
			let b = this[x];
			this[x] = this[y];
			this[y] = b;
			return this;
		})

		const appTemplate = (data) => html `
			<div class="testimonials-container">
        <div class="test-sides test-left">
          <div class="person-img" style="background: url('https://d3iw72m71ie81c.cloudfront.net/male-30.jpg');">
            <div class="hover-bg">
              <div class="name">James</div>
            </div>
          </div>
        </div>
        <div class="test-center">
          <div class="header">
            <div class="user-img" style="background: url('https://d3iw72m71ie81c.cloudfront.net/8912fe22-7970-4e15-a3a1-abef9f2fb4b5')">

            </div>
            <div class="info">
              <h4>Jenny Benzino</h4>
              <span>CEO, Nike</span>
            </div>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        <div class="test-sides test-right">
          <div class="person-img" style="background: url('https://d3iw72m71ie81c.cloudfront.net/88b95197-fd1e-4e11-8793-2903a5cfd06e-10584053_10153749310922416_3125632463004974493_n.jpg')">
            <div class="hover-bg">
              <div class="name">Bryant</div>
            </div>
          </div>
        </div>
      </div>
		`
		render(appTemplate(postData), document.getElementById('testimonials-app'));
	}
