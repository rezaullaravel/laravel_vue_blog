<template>
	<div class="content-wrapper">


        <!-- Main content -->
        <section class="content" style="padding-top: 50px;">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                 <div class="col-lg-10 offset-lg-1">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="bg-light">All Tags
                                <router-link to="/tag/create" class="btn btn-success" style="float: right">Add</router-link>
                            </h2>


                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tag Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr v-for="tag in result" :key="tag.id">
                                        <td>{{ tag.id }}</td>
                                        <td>{{ tag.tagName }}</td>
                                        <td>
                                            <router-link :to="{name:'editTag',params:{ id:tag.id } }" class="btn btn-success">Edit</router-link>

                                            <button type="button" @click.prevent = "deleteTag(tag)" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->


  </div>


</template>


<script>


 export default{
            data(){
                return{
                    result: [

                    ],
                }
            },



         mounted(){
            axios.get('/show/tag')
           .then((response)=> {
            this.result = response.data.tags

        })

        },//end mounted


        methods:{
            deleteTag(tag){
                if(confirm('Are you sure to delete this tag???')){
                    axios.get('/delete/tag/'+tag.id)
                    .then((response)=> {

                        this.$toast.success({
                        title:'Success!',
                        message:'Tag deleted Successfully'
                        })

                        let index = this.result.indexOf(tag);
                        this.result.splice(index, 1);

                 })
                }
            }
        }






 }
</script>






