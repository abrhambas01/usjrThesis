<template>
    <v-layout justify-center>
        <!-- show this loader before loading the form _fields -->
        <div id="loader" v-show="loading === true ">
            <sync-loader :loading="loading"  :size="size"></sync-loader>
        </div>
        <v-flex xs12 sm10 md8 lg6>
            <v-card ref="form">
                <v-toolbar color="blue accent-4" dark>
                    <v-btn icon>
                        <v-icon>person</v-icon>
                    </v-btn>
                    <v-toolbar-title>Profile Information</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>

                <v-card-text>
                    <h1 class="title">Edit your Account information by filling the fields below</h1>

                    <h2 class="subheading mb-3">Fields with * are required fields</h2>

                    <v-text-field
                            ref="name"
                            v-model="accountData.first_name"
                            :error-messages="errorMessages"
                            label="First Name"
                            required>
                    </v-text-field>

                    <v-text-field
                            ref="middle_name"
                            v-model="accountData.middle_name"
                            :error-messages="errorMessages"
                            label="Middle Name"
                            placeholder="John"
                            required>
                    </v-text-field>


                    <v-text-field
                            ref="last_name"
                            v-model="accountData.last_name"
                            :error-messages="errorMessages"
                            label="Last Name"
                            required>
                    </v-text-field>


                    <v-text-field
                            ref="hNumber"
                            v-model="accountData.house_number"
                            label="House Number"
                            placeholder="John Doe"
                            required
                    >
                    </v-text-field>

                    <v-text-field
                            ref="mobilePhone"
                            v-model="accountData.mobile_phone"
                            :error-messages="errorMessages"
                            label="Your Mobile Number"
                            placeholder="John Doe"
                            required
                    ></v-text-field>

                    <v-text-field
                            ref="name"
                            v-model="accountData.postal_code"
                            :error-messages="errorMessages"
                            label="Postal Code"
                            placeholder="John Doe"
                            required
                    ></v-text-field>


                    <v-text-field
                            ref="address"
                            v-model="accountData.work_address"
                            label="Address Line"
                            placeholder="Snowy Rock Pl"
                            required
                    >
                    </v-text-field>

                    <v-text-field
                            ref="address"
                            v-model="accountData.company"
                            label="Employer / Other company"
                            placeholder="Snowy Rock Pl"
                            required
                    >
                    </v-text-field>

                    <v-text-field
                            ref="alternate_email"
                            v-model="accountData.alternate_email"
                            label="Alternate Email"
                            placeholder="Snowy Rock Pl"
                            counter="80"
                            required
                    >
                    </v-text-field>


                </v-card-text>

                <v-divider class="mt-5"></v-divider>
                <v-card-actions>
                    <v-btn flat>Cancel</v-btn>
                    <v-spacer></v-spacer>
                    <v-slide-x-reverse-transition>
                        <v-tooltip
                                v-if="formHasErrors"
                                left
                        >
                            <v-btn
                                    slot="activator"
                                    icon
                                    class="my-0"
                                    @click="resetForm"
                            >
                                <v-icon>refresh</v-icon>
                            </v-btn>
                            <span>Refresh form</span>
                        </v-tooltip>
                    </v-slide-x-reverse-transition>
                    <v-btn color="primary" @click="submit">Submit</v-btn>
                </v-card-actions>

                <v-snackbar
                        :timeout="timeout"
                        :top="y === 'top'"
                        :bottom="y === 'bottom'"
                        :right="x === 'right'"
                        :left="x === 'left'"
                        :multi-line="mode === 'multi-line'"
                        :vertical="mode === 'vertical'"
                        v-model="snackbar"
                >
                    {{ snackBarText }}
                    <v-btn flat color="pink" @click.native="snackbar = false">Close</v-btn>
                </v-snackbar>

            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
    import SyncLoader from 'vue-spinner/src/SyncLoader.vue';

    export default {

        components: {SyncLoader},

        data: () => ({
            loading: false,

            accountData: [],

            size : '30px',

            form: {
                first_name: '',
                middle_name: '',
                last_name: '',
                picture: '',
                work_address: '',
                house_number: '',
                street_name: '',
                postal_code: ' ',
                mobile_phone: '',
                telephone: '',
                company: '',
                alternate_email: ''
            },

            countries: ['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Anguilla', 'Antigua &amp; Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia &amp; Herzegovina', 'Botswana', 'Brazil', 'British Virgin Islands', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cambodia', 'Cameroon', 'Cape Verde', 'Cayman Islands', 'Chad', 'Chile', 'China', 'Colombia', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote D Ivoire', 'Croatia', 'Cruise Ship', 'Cuba', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Estonia', 'Ethiopia', 'Falkland Islands', 'Faroe Islands', 'Fiji', 'Finland', 'France', 'French Polynesia', 'French West Indies', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kuwait', 'Kyrgyz Republic', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macau', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Mauritania', 'Mauritius', 'Mexico', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nepal', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Norway', 'Oman', 'Pakistan', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Pierre &amp; Miquelon', 'Samoa', 'San Marino', 'Satellite', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'South Africa', 'South Korea', 'Spain', 'Sri Lanka', 'St Kitts &amp; Nevis', 'St Lucia', 'St Vincent', 'St. Lucia', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', "Timor L'Este", 'Togo', 'Tonga', 'Trinidad &amp; Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks &amp; Caicos', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Venezuela', 'Vietnam', 'Virgin Islands (US)', 'Yemen', 'Zambia', 'Zimbabwe'],


            errorMessages: [],

            name: null,

            address: null,

            city: null,

            state: null,

            zip: null,

            country: null,

            formHasErrors: false,

            snackbar: false,

            y: 'top',

            x: null,

            mode: '',

            timeout: 8000,

            snackBarText: 'Users\' information was saved'


        }),

        computed: {},

        watch: {
            name() {
                this.errorMessages = []
            }
        },


        //Before We go to this route..


        // beforeRouteEnter(to,from,next){

        // 	getUsersInfo(t)

        // },

        created() {
            this.fetchData();


        },


        methods: {
            fetchData() {
                axios.get('api/v1/courier/information')
                    .then(response => this.accountData = response.data)
                    .catch(error => swal("Fill your information", "You can now add your information fields", "success"));
                // else{
                // 	swal("update information", "You can update your information fields", "success");
                // }

                // console.log(error.response.data);
            },

            addressCheck() {
                this.errorMessages = this.address && !this.name
                    ? ['Hey! I\'m required']
                    : []

                return true;
            },

            resetForm() {
                this.errorMessages = []
                this.formHasErrors = false

                Object.keys(this.form).forEach(f => {
                    this.$refs[f].reset()
                })
            },

            submit() {
                // Show the pacman loader until the user's information is saved then hide it. sho
                this.loading = true;
                // add a timeout soon.
                axios({
                    method: 'PUT',
                    url: 'update/profile',
                    data: this.accountData
                }).then(function (response) {
                    response => {
                        setTimeout(() => {
                            console.log(response);
                            this.loading = true;
                            this.snackbar = true;
                             }, 1500);
                    }

                }).catch(function (error) {
                    console.log('false');
                    // console.log(error);
                });

                Object.keys(this.form).forEach(f => {
                    if (!this.form[f]) this.formHasErrors = true

                    this.$refs[f].validate(true)
                })
            }


        }
    }
</script>

<style lang="css" scoped>
    #loader {
        position: absolute;
        left: 30px;
        bottom: 80px;
        z-index: 3;
    }
</style>