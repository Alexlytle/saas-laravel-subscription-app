require('./bootstrap');

function delay(n) {
  n = n || 2000;
  return new Promise((done) => {
      setTimeout(() => {
          done();
      }, n);
  });
}

function pageTransition() {
  var tl = gsap.timeline();
  tl.to(".loading-screen", {duration: 1.2, width: "100%",left: "0%", ease: "Expo.easeInOut",})
  tl.to(".loading-screen", {duration: 1,width: "100%",left: "100%",ease: "Expo.easeInOut",delay: 0.3,});
  tl.set(".loading-screen", { left: "-100%" });
}

console.log('yes')
barba.init({
    // debug: true,

    transitions: [
      {
        name: "product-transition",
        // from: { namespace: ["home_page","web_design","web_apps","about_page","contact_page","dashboard","logo_page",'dashboard'] },
        // to: { namespace: ["home_page","web_design","web_apps","about_page","contact_page","dashboard","logo_page",'dashboard'] },
        async leave(data) {
          // const done = this.async();
          // pageTransition();
          //  await delay(1000);
          // done();
    
        },
       async enter(){
     
          window.scrollTo(0, 0);

          const done = this.async();
            document.querySelector(".burger").classList.remove("active");
            gsap.to(".line1", 0.5, { rotate: "0", y: 0});
            gsap.to(".line2", 0.5, { rotate: "0", y: 0 });
      
            gsap.to(".nav-bar", 1, { clipPath: "circle(50px at 100% -10%)" });
            document.body.classList.remove("hide");
            document.body.style.overflowY ='unset'
            await delay(1000);
            done();
        }
      
      }
    ],
  views:[
    { 
      namespace:"home_page",
      afterEnter(){
        setTimeout(() => {
          const app = Vue.createApp({
            data() {
              return {
                cardOne: "start",
                count:0
              };
             },
          
          })
          
          app.component('tabs',{
            props:['title','titletwo','titlethree','bodyone','bodytwo','bodythree'],
            data(){
              return{
                activetab:1,
                // title:'hello'
               
              }
            },
            methods:{
              prevent(e){
                e.preventDefault()
               console.log(this.activetab)
            
              }
            },
            template:`
                 <div class="containerTabDirect  row">
                                  <div class="tabs"> 
                               
          <a @click = 'activetab = 1,prevent($event)'  class="tab tab-1 " v-bind:class="[ activetab === 1 ? 'active' : '' ]" href="" data-tab="1">{{title}} </a>
          <a  @click = 'activetab = 2,prevent($event)' v-bind:class="[ activetab === 2 ? 'active' : '' ]" class="tab tab-2" href="" data-tab="2">{{titletwo}}</a>
          <a  @click = 'activetab = 3,prevent($event)' v-if = "titlethree!==''"  class="tab tab-3"  v-bind:class="[ activetab === 3 ? 'active' : '' ]" href="" data-tab="3">{{titlethree}}</a>
          
                                
                                    <span class="highlighter"></span>
                                    
                                  </div>
                                
                                  <div class="content">
                                
                                    <div  v-if="activetab === 1" class="content__section visible product-content" >
                                          <p> {{bodyone}}</p>
                                    </div>
                                     <div v-if="activetab === 2" class="content__section  product-content" >
                                          <p>{{bodytwo}}</p>
                                    </div>
                                    <div   v-if="activetab === 3 && bodythree !==''" class="content__section">
                                        <p> {{bodythree}}</p>
                                    </div>
                                    
                                  </div>
                                </div>
            `
            
          })
          
          app.mount('#app')
        }, 10);
      
      },
    
    },
    {
      "namespace":"logo_page",
      beforeEnter(){
        document.querySelectorAll(".menu-items a").forEach((item)=>{
          item.style.color = 'black';
        })

        document.querySelector('#logo_page').style.color = '#247295'

        document.querySelector(".burger").target.classList.remove("active");
      
     
      }
    },
    {
      "namespace":"web_design",
      beforeEnter(){
        document.querySelectorAll(".menu-items a").forEach((item)=>{
          item.style.color = 'black';
        })
        document.querySelector('#web_design').style.color = '#247295'
      }, 
    },
    {
      "namespace":"webdevelopment",
      beforeEnter(){
        document.querySelectorAll(".menu-items a").forEach((item)=>{
          item.style.color = 'black';
        })
        document.querySelector('#webdevelopment').style.color = '#247295'
        document.querySelector('#webdevelopment').disable = true
      }, 
    },

    {
      "namespace":"contact_page",
      beforeEnter(){
        document.querySelectorAll(".menu-items a").forEach((item)=>{
          item.style.color = 'black';
        })
        document.querySelector('#contact_page').style.color = '#247295'
      }, 
    },
    {
      "namespace":"about_page",
      beforeEnter(){
        document.querySelectorAll(".menu-items a").forEach((item)=>{
          item.style.color = 'black';
        })
        document.querySelector('#about_page').style.color = '#247295'
      }, 
    },
    {
      "namespace":"dashboard",
      beforeEnter(){
        document.querySelectorAll(".menu-items a").forEach((item)=>{
          item.style.color = 'black';
        })
        document.querySelector('#dashboard').style.color = '#247295'
      }, 
    }
  ]
})




function navToggle(e) {
    if (!e.target.classList.contains("active")) {
      e.target.classList.add("active");
      gsap.to(".line1", 0.5, { rotate: "45", y: 5});
      gsap.to(".line2", 0.5, { rotate: "-45", y: -5 });
   
      gsap.to(".nav-bar", 1, { clipPath: "circle(2500px at 100% -10%)" });
      document.body.classList.add("hide");

      document.body.style.overflowY ='hidden'
    } else {
      e.target.classList.remove("active");
      gsap.to(".line1", 0.5, { rotate: "0", y: 0});
      gsap.to(".line2", 0.5, { rotate: "0", y: 0 });

      gsap.to(".nav-bar", 1, { clipPath: "circle(50px at 100% -10%)" });
      document.body.classList.remove("hide");
      document.body.style.overflowY ='unset'
    }
  }
  const burger = document.querySelector(".burger");
  burger.addEventListener("click", navToggle);
  