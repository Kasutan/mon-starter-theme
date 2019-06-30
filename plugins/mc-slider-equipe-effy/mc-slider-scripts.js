(function($) {
    $( document ).ready(function() {
        const mySiema = new Siema({

            loop:true,

            duration :800,
        
            perPage: {
                800: 2, // 2 items for viewport wider than 800px
                1000: 3 // 3 items for viewport wider than 1240px
            },

            onInit : setCurrentSlide,
            onChange : setCurrentSlide,

        });

        setInterval(() => mySiema.next(), 10000);

        mySiema.addArrows();
    });
    
    function setCurrentSlide() {
        var index=this.currentSlide;
        $('.siema button.dot').removeClass('current');
        $('.siema button.dot[data-index="'+index+'"]').addClass('current');
    }

    Siema.prototype.addArrows = function() {
        // make buttons & append them inside Siema's container
    
        this.prevArrow = document.createElement('button');
    
        this.nextArrow = document.createElement('button');
    
        this.prevArrow.className = "fleche gauche genericon genericon-leftarrow";
        this.prevArrow.setAttribute("title","Naviguer vers le membre précédent") ;
    
        this.nextArrow.className = "fleche droite genericon genericon-rightarrow";
        this.nextArrow.setAttribute("title","Naviguer vers le membre suivant") ;

    
        //this.selector.appendChild(this.prevArrow)
        $('#siema-fleches').append(this.prevArrow);
        //this.selector.appendChild(this.nextArrow)
        $('#siema-fleches').append(this.nextArrow);

        // event handlers on buttons
    
        this.prevArrow.addEventListener('click', () => this.prev());
    
        this.nextArrow.addEventListener('click', () => this.next());
    
        //Add dots
    
        for (let i = 0; i < this.innerElements.length; i++) {
            const btn = document.createElement('button');
            btn.textContent = i;
            if(i===0) {
                btn.className = "dot current";

            } else {
                btn.className = "dot";
            }
            btn.dataset.index= i;
            btn.setAttribute("title","Naviguer vers le membre n°"+(+i + +1));
            btn.addEventListener('click', () => this.goTo(i));
            this.selector.appendChild(btn);
        }
    
        }
    
   
})( jQuery );

