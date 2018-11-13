<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wizzard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link href="css/main.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

        <!-- Styles -->

    </head>
    <body>

        <div class="flex-center position-ref full-height">
{{--            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif--}}

            <div class="content">

                <form method="POST" action="">
                    <div class="container">
                        <div id="app">


                            <div v-show="currentstep == 1">
                                <h3>Step 1</h3>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div v-show="currentstep == 2">
                                <h3>Step 2</h3>
                                <div class="form-group">
                                    <label for="select">Example select</label>
                                    <select class="form-control" name="select">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div v-show="currentstep == 3">
                                <h3>Step 3</h3>
                                <div class="form-group">
                                    <label for="textarea">Example textarea</label>
                                    <textarea class="form-control" name="textarea" rows="4"></textarea>
                                </div>

                            </div>

                            <step v-for="step in steps" :currentstep="currentstep" :key="step.id" :step="step" :stepcount="steps.length" @step-change="stepChanged">
                            </step>

                            <script type="x-template" id="step-navigation-template">
                                <ol class="step-indicator">
                                    <li v-for="step in steps" is="step-navigation-step" :key="step.id" :step="step" :currentstep="currentstep">
                                    </li>
                                </ol>
                            </script>

                            <script type="x-template" id="step-navigation-step-template">
                                <li :class="indicatorclass">
                                    <div class="step"><i :class="step.icon_class"></i></div>
                                    <div class="caption hidden-xs hidden-sm">Step <span v-text="step.id"></span>: <span v-text="step.title"></span></div>
                                </li>
                            </script>

                            <script type="x-template" id="step-template">
                                <div class="step-wrapper" :class="stepWrapperClass">
                                    <button type="button" class="btn btn-primary" @click="lastStep" :disabled="firststep">
                                        Back
                                    </button>
                                    <button type="button" class="btn btn-primary" @click="nextStep" :disabled="laststep">
                                        Next
                                    </button>
                                    <button type="submit" class="btn btn-primary" v-if="laststep">
                                        Submit
                                    </button>
                                </div>
                            </script>
                        </div>
                    </div>
                </form>


            </div>



        </div>




        <script>

            Vue.component("step-navigation-step", {
                template: "#step-navigation-step-template",

                props: ["step", "currentstep"],

                computed: {
                    indicatorclass() {
                        return {
                            active: this.step.id == this.currentstep,
                            complete: this.currentstep > this.step.id
                        };
                    }
                }
            });

            Vue.component("step-navigation", {
                template: "#step-navigation-template",

                props: ["steps", "currentstep"]
            });

            Vue.component("step", {
                template: "#step-template",

                props: ["step", "stepcount", "currentstep"],

                computed: {
                    active() {
                        return this.step.id == this.currentstep;
                    },

                    firststep() {
                        return this.currentstep == 1;
                    },

                    laststep() {
                        return this.currentstep == this.stepcount;
                    },

                    stepWrapperClass() {
                        return {
                            active: this.active
                        };
                    }
                },

                methods: {
                    nextStep() {
                        this.$emit("step-change", this.currentstep + 1);
                    },

                    lastStep() {
                        this.$emit("step-change", this.currentstep - 1);
                    }
                }
            });

            new Vue({
                el: "#app",

                data: {
                    currentstep: 1,

                    steps: [
                        {
                            id: 1,
                            title: "Personal",
                            icon_class: "fa fa-user-circle-o"
                        },
                        {
                            id: 2,
                            title: "Details",
                            icon_class: "fa fa-th-list"
                        },
                        {
                            id: 3,
                            title: "Send",
                            icon_class: "fa fa-paper-plane"
                        }
                    ]
                },

                methods: {
                    stepChanged(step) {
                        this.currentstep = step;
                    }
                }
            });



        </script>

    </body>
</html>
