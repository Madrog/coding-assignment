<template>
    <div class="section">
                <table class="table table-striped" width="100%">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Gender</td>
                    <td>SACCO</td>
                    <td>Total Deposit</td>
                </tr>
                <tr v-for="i in individuals.data">
                    <td>{{ i.id }}</td>
                    <td>{{ i.name }}</td>
                    <td>{{ i.email }}</td>
                    <td>{{ i.gender }}</td>
                    <td>{{ i.sacco }}</td>
                    <td>{{ i.totdep }}</td>   
                </tr>
            </table>   
    </div>
</template>

<script>
    export default {
        data () {
            return {
            individuals: null,
            loading: true,
            errored: false
            }
        },

        filters: {
            currencydecimal (value) {
            return value.toFixed(0)
            }  
        },

        mounted() {
            axios
            .get('/api/individuals')
            .then(response => {
                this.individuals = response
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
        }
    }
</script>