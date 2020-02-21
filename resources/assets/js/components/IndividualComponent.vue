<template>
    <div class="section">
        
         <section v-if="errored">
            <p>We're sorry, we're not able to retrieve this information at the moment, please try back later</p>
        </section>

        <section v-else>
            <div v-if="loading">Loading...</div>

            <div v-else>
                <table class="table" width="100%">
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
                    <td>{{ i.totdep | currency }}</td>   
                </tr>
                </table> 
            </div>
        </section>  
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
            currency (value) {
            return 'UGX' + value.toFixed(0)
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