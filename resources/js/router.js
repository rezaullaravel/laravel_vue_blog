import Vue from "vue";
import Router from 'vue-router'


//project component
import home from "./components/pages/home"
import tags from "./components/pages/tag"
import addTag from "./components/pages/addTag";
import editTag from "./components/pages/editTag";
import category from "./components/category/category";
import categoryCreate from "./components/category/categoryCreate";
import categoryEdit from "./components/category/categoryEdit";

//blog
import blog from "./components/blog/blog";
import createBlog from "./components/blog/create";
import editBlog from "./components/blog/edit";


//frontend
import frontHome from "./components/frontend/home";
import categoryBlog from "./components/frontend/categoryWiseBlog";


Vue.use(Router)


const routes = [

//project route
{
    path:'/home',
    component:home
},

{
    path:'/tags',
    component:tags
},

{
    path:'/tag/create',
    component:addTag,
    name:'createTag'
},

{
    path:'/tag/:id/edit',
    component:editTag,
    name:'editTag'
},
//tag end


//category route
{
    path:'/category',
    component:category
},

{
    path:'/category/create',
    component:categoryCreate
},

{
    path:'/category/edit/:id',
    component:categoryEdit,
    name:'editCategory'
},

//blog route
{
    path:'/blog',
    component:blog
},

{
    path:'/create/blog',
    component:createBlog
},

{
    path:'/edit/blog/:id',
    component:editBlog,
},

//frontend
{
    path:'/',
    component:frontHome
},

{
    path:'/categoryWise/blog/:id',
    component:categoryBlog
},








]

export default new Router({
    mode:'history',
    routes
})
