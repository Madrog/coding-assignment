<template>
    <div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <br>
                    <hr>
                    <br>
                    <div class="panel-heading">Individuals</div>
                    <br>
                    <div class="panel-body">
                      {{ individuals }}
                    </div>
                </div>
            </div>
        </div>
    </div>
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