$('document').ready(function() {
   loadGoods().done(function() {
      $('.trigger').on('click', function() {
         $('.modal-wrapper').toggleClass('open');
         $('.page-wrapper').toggleClass('blur-it');
         return false;
     });
     $('.head').on('click', function (){
         $('.modal-wrapper').removeClass('open');
     })
   });
})

function loadGoods() {
   //загружаем товары на страницу
   return $.getJSON('product.json', function (data) {
      let out = '';
      function pattern(name, img, price) {
         return `
         <div class="cart_list">
            <div class="cart_item">
            <img src="${img}"/>
            <p class="item_list">${name}</p>
            <h2 class="item_price">${price}</h2>
            </div>
            <button class="btn trigger">Купить</button>
         </div>
         `
      }
      data.product.forEach(element => {
         const {name, img, price} = element;
         out += pattern(name, img, price);
      });
  
      $('#cart').html(out);
   })
}
