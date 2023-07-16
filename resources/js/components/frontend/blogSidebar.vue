<template>

    <div>
        <div class="sidebar">
         <div class="sidebar_top">
            <!---categories show-->
            <h3>Blog Categories</h3>
            <div class="sidebar_top_list" v-for="category in categoriess">
               <ul>
                  <li>
                     <router-link :to="`/categoryWise/blog/${category.id}`" >
                        <span class="category-name">{{ category.categoryName }}</span> <span class="count">(6)</span>
                        <div class="clear"></div>
                     </router-link>
                  </li>
               </ul>
            </div>
            <!---categories show end-->
         </div>
         <div class="popular-post">
            <h3>popular-posts</h3>
            <div class="post-grid">
               <img src="" title="post1" alt=""/>
               <p>Lorem ipsum dolor sit amet consectetur dolor more normal of letters,<a href="#">[...]</a></p>
               <div class="clear"> </div>
            </div>
            <div class="post-grid">
               <img src="" title="post1" alt=""/>
               <p>Lorem ipsum dolor sit dolor more normal consectetur of letters,<a href="#">[...]</a></p>
               <div class="clear"> </div>
            </div>
            <div class="post-grid">
               <img src="" title="post1" alt=""/>
               <p>Lorem ipsum dolor sit dolor more normal consectetur of letters sit amet,<a href="#">[...]</a></p>
               <div class="clear"> </div>
            </div>
            <div class="view-all"><a href="#">
               </a><a href="#">ViewAll</a>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
    </div>
</template>

<script>
  export default{
    data() {
        return {
            categoriess: [],
        };
    },
    mounted() {
        axios.get("/get/blog/category")
            .then((response) => {
            this.categoriess = response.data.categories;
            //console.log(response.data.categories);
        });
    },

}
</script>
