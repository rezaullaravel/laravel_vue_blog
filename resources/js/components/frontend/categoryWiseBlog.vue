<template>
    <div>
    <div class="main">
       <div class="content">
          <div class="box1" v-for="blogPost in results">
            <h4>Category:<span class="text-danger">{{ blogPost.category.categoryName }}</span></h4>
             <h3>{{ blogPost.title }}</h3>
             <div class="view">
                   <img :src="'../../'+blogPost.image" alt="kkk">
             </div>
             <div class="data">
                <p>{{ blogPost.description }}</p>
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

<style>
.text-danger {
    color: red !important;
    font-size: 16px !important;
    display: inline !important;
    padding-left: 5px;
    background: #fff;
    padding: 3px 48px;
}
</style>



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
            let id = this.$route.params.id;
            axios.get('/get/blogPostByCategoryId/'+id)
           .then((response)=> {
            this.results = response.data.blogs
            //console.log(response.data.blogs);


        });


        },//end mounted
    components:{
    blogSidebar,
},


}
</script>

