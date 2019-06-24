<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Поиск палиндромов</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Введите строку</label>
                            <textarea v-model="searchInput" class="form-control" id="exampleFormControlTextarea1"
                                      rows="3"></textarea>
                        </div>
                        <button type="button" @click="searchPalindrome" class="btn btn-primary search-btn has-spinner">
                            Найти
                        </button>
                    </div>


                </div>
            </div>
            <div class="col-md-8 mt-3" v-if="resultSearch.length">
                <div class="card">
                    <div class="card-header text-center">Результаты поиска</div>
                    <div class="card-body">
                        <h6 v-for="palindrome in resultSearch">{{palindrome}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3" v-if="isLoading">
                <div class="card">
                    <div class="card-header text-center">Результаты поиска</div>
                    <div class="card-body d-flex justify-content-center">
                        <img src="/img/91.svg">
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3" v-if="resultSearch.error !== undefined">
                <div class="card">
                    <div class="card-header text-center">Результаты поиска</div>
                    <div class="card-body">
                        <div class="alert alert-danger text-center">
                            <h6>{{resultSearch.error}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        },
        data() {
            return {
                searchInput: '',
                resultSearch: {},
                isLoading: false,

            }
        },
        methods: {
            /**
             * Поиск палиндромов
             */
            searchPalindrome: function () {
                this.isLoading = true;
                this.resultSearch = {};
                axios( {
                    method: 'post',
                    url: '/palindrome/search',
                    data: { palindrome: this.searchInput }
                } ).then( ( response ) => {
                    this.resultSearch = response.data;
                    this.isLoading = false;
                } );
            }

        }
    }
</script>
