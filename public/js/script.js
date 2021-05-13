
//preloader
window.addEventListener('load', () => document.querySelector('.preloader')
.classList.add('hidePreloader'))
//end preloader

//user icon//
$('data-toggle="tooltip"').tooltip();



// Rating Initialization








// //car data
// const createcars = (() => {
//   const cars=[];
//
//   class Car{
//     constructor(make,country,img,special,model,price,type,trans,gas){
//       this.make = make;
//       this.country = country;
//       this.img = img;
//       this.special = special;
//       this.model = model;
//       this.price= price;
//       this.type = type;
//       this.trans = trans;
//       this.gas = gas;
//     }
//   }
//   //car creation function
//   function makecar(make,country,img = 'img/car-default.jpg',special=true,model='new model',price=10000,type='sedan',trans='automatic',gas = '50'){
//     const car =new Car(make,country,img,special,model,price,type,trans,gas);
//     cars.push(car)
//   }
//   //makecar('chevy','american');
//   //produce Cars
//   function producecars(){
//     makecar('chevy','american');
//     makecar('mercedes','german','img/german2.jpg',true);
//     makecar('bmw','german','img/german4.jpg');
//     makecar('bmw','german','img/german6.jpg',false,'some model');
//     makecar('mercedes','german','img/german2.jpg',undefined,'other model');
//
//     makecar('mercedes','german','img/german4.jpg',false);
//     makecar('chevy','american','img/american7.jpg');
//     makecar('chevy','american','img/american7.jpg',false);
//     makecar('chevy','american','img/american7.jpg',false);
//     makecar('chevy','american','img/american7.jpg',false);
//     makecar('chevy','american','img/american7.jpg',false);
//   }
//   producecars();
//
//   const specialcars = cars.filter(car => car.special === true)
//   return {
//     cars,
//     specialcars
//   }
// })();
//
// const displayspecialcars = ((createcars)  => {
//   const specialcars = createcars.specialcars;
//   //console.log(specialcars);
//   const info = document.querySelector('.featured-info');
//   //document loaded enet
//   document.addEventListener('DOMContentLoaded',() => {
//     info.innerHTML = '';
//
//     let data = '';
//     specialcars.forEach(item => {
//       data += `<!---single item--->
//       <div class="featured-item my-3 d-flex p-2 text-capitalize align-items-baseline flex-wrap">
//         <span data-img="${item.img}" class="featured-icon mr-2">
//           <i class="fas fa-car"></i>
//         </span>
//         <h5 class="font-weight-bold mx-1">${item.make}</h5>
//         <h5 class="mx-1">${item.model}</h5>
//       </div>
//       <!---end single item--->`
//     })
// info.innerHTML = data;
//   })
//
//   //change img
//   info.addEventListener('click',(event)=>{
//     if (event.target.parentElement.classList.contains('featured-icon')) {
//        const img = event.target.parentElement.dataset.img;
//        document.querySelector('.featured-photo').src = img;
//     }
//   })
// })(createcars);
