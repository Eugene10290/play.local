 'use strict';

 $('.menu-btn').on('click', function(e){
  e.preventDefault;
  $(this).toggleClass('menu-btn_active');
   $('.mnu').toggleClass('menu_active');
 });

 (function(){
     'use strict';

     class Component {

         printError(error) {

             if (typeof error !== 'string' || error.length === 0) {
                 return console.log('you did not give arguments');
             }

             return console.log(error);
         }

         toggleСlass(node, className) {
             return  node.classList.toggle(className);
         }
     }

     class Menu extends Component {

         constructor(settings) {
             super();
             this.menuNode = settings.menuNode;
         }

         toggleMenuState(className) {

             if (typeof className !== 'string' || className.length === 0){
                 return super.printError('you did not give the class name for the toggleState function');
             }

             return super.toggleСlass(this.menuNode, className);
         }
     }

     let jsMenuNode = document.querySelector('body');

     let demoMenu = new Menu ({
         menuNode: jsMenuNode
     });

     function callMenuToggle() {
         demoMenu.toggleMenuState('js-menu_activated');
     }

     jsMenuNode.querySelector('.js-menu__toggle').addEventListener('click', callMenuToggle);
 })();
