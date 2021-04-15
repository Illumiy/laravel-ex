<template>
    <div>
        <h2 class="text-center">shits List</h2>
 
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="shit in shits" :key="shit.id">
                <td>{{ shit.id }}</td>
                <td>{{ shit.name }}</td>
                <td>{{ shit.detail }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: shit.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteshit(shit.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                shits: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/shits/')
                .then(response => {
                    this.shits = response.data;
                });
        },
        methods: {
            deleteshit(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/shits/${id}`)
                    .then(response => {
                        let i = this.shits.map(data => data.id).indexOf(id);
                        this.shits.splice(i, 1)
                    });
            }
        }
    }
</script>