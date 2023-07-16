<template>
   <div>
   <div class="main">
      <div class="content">
         <div class="box1" v-for="blog in results">
            <h3>{{ blog.title }}</h3>
            <div class="view">
                  <img :src="blog.image" alt="">
            </div>
            <div class="data">
               <p>{{ blog.description }}</p>
               <span><router-link to="">Continue reading >>></router-link></span>
            </div>
            <div class="clear"></div>
         </div>
         <div class="page_links">
            <div class="page_numbers">
               <ul>
                  <!-- {<li><router-link to="#">1</router-link></li>
                  <li class="active"><router-link to="#">2</router-link></li>
                  <li><router-link to="#">3</router-link></li>
                  <li><router-link to>4</router-link></li>
                  <li><router-link to="#">5</router-link></li>
                  <li><router-link to="#">6</router-link></li>
                  <li><router-link to="#">... Next</router-link></li>} -->
               </ul>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <blogSidebar></blogSidebar>
      <div class="clear"></div>

   </div>
</div>
 </template>



<script>
import blogSidebar from './blogSidebar.vue'

export default{
    data(){
               return{
                    results: [

                    ],
                }
        },

        mounted(){
            axios.get('/get/blogPost')
           .then((response)=> {
            this.results = response.data.posts
            //console.log(response.data.posts);


        })

        },//end mounted
    components:{
    blogSidebar,
},


}
</script>
