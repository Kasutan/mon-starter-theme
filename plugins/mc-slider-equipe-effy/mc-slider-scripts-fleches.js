Siema.prototype.addArrows = function() {

	// make buttons & append them inside Siema's container

	this.prevArrow = document.createElement('button');

	this.nextArrow = document.createElement('button');

	this.prevArrow.textContent = '<';

	this.nextArrow.textContent = '>';

	this.prevArrow.className = "gauche";

	this.nextArrow.className = "droite";

	this.selector.appendChild(this.prevArrow)

	this.selector.appendChild(this.nextArrow)

	// event handlers on buttons

	this.prevArrow.addEventListener('click', () => this.prev());

	this.nextArrow.addEventListener('click', () => this.next());

	}



	setTimeout(function(){ 

		const mySiema = new Siema({

		loop:true,

        duration :800,
        
        perPage: {
            800: 2, // 2 items for viewport wider than 800px
            1000: 3 // 3 items for viewport wider than 1240px
        }

	});

	setInterval(() => mySiema.next(), 10000);

	mySiema.addArrows();

  }, 3000);
