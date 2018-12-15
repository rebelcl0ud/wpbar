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

/** 
	item.id changes from 1st GET req to 2nd GET req; 1st id is used to fetch image data obj (2nd call) where id differs, that id matches featured_media from 1st GET so that's what I'm using to snag the correct associated image

	3 images viewed as an array; left being at 0 index; mid at 1 index; right at 2 index

	the click events right/ left are to swap with mid picture(all info featured), show name/position and testimonial written
**/
let getImageById = (featured_media) => {
	let Image = postImages.filter((item) => item.id === featured_media)
		return Image[0].image;
}

// https://github.com/axios/axios
axios.get('wp-json/wp/v2/testimonials')
	.then((response) => {
		// console.log(response.data)
		postData = response.data;
		// loop over posts, snag IDs
		postData.map((item) => {
			// console.log(item.id);
		
			// IDs used to snag images
			return axios.get(`wp-json/wp/v2/media?parent=${item.id}`)
				.then((res) => {
					// console.log(res.data)
					let imageLookup = res.data;
					imageLookup.map((item) => {
						postImages.push({
							id: item.id,
							image: item.media_details.sizes.medium.source_url
						});
						// console.log(postImages);
					})
					initApp(response);
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
		// console.log(testimonialsData[0].featured_media);
		Array.prototype.swap = ((x,y) => {
			let b = this[x];
			this[x] = this[y];
			this[y] = b;
			return this;
		})

		let clickedLeft = () => {
			postData.swap(1,0);
			render(appTemplate(postData), document.getElementById('testimonials-app'))
		}

		let clickedRight = () => {
			postData.swap(1,2);
			render(appTemplate(postData), document.getElementById('testimonials-app'))
		}

		// https://lit-html.polymer-project.org/guide/template-reference#binding-types
		const appTemplate = (data) => html `
			<div class="testimonials-container">
        <div class="test-sides test-left" @click=${(e) => clickedLeft()}>
          <div class="person-img" style="background: url('${getImageById(testimonialsData[0].featured_media)}');">
            <div class="hover-bg">
              <div class="name">${testimonialsData[0].name_writer}</div>
            </div>
          </div>
        </div>
        <div class="test-center">
          <div class="header">
            <div class="user-img" style="background: url('${getImageById(testimonialsData[1].featured_media)}')">

            </div>
            <div class="info">
              <h4>${testimonialsData[1].name_writer}</h4>
              <span>${testimonialsData[1].position_writer}</span>
            </div>
          </div>
          <p>
            ${testimonialsData[1].content.rendered}
          </p>
        </div>
        <div class="test-sides test-right" @click=${(e) => clickedRight()}>
          <div class="person-img" style="background: url('${getImageById(testimonialsData[2].featured_media)}')">
            <div class="hover-bg">
              <div class="name">${testimonialsData[2].name_writer}</div>
            </div>
          </div>
        </div>
      </div>
		`
		render(appTemplate(postData), document.getElementById('testimonials-app'));
	}
