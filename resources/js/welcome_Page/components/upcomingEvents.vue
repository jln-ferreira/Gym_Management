<template>
    <section class="pb-5 upcomingEvents">
        <div class="container">
            <div class="row justify-content-center pt-5 pb-5">
                <h3>UPCOMING EVENTS</h3>
            </div>
            <div class="d-flex justify-content-around">
                <div class="col-lg-4 col-md-6 col-sm-12 shadow bg-light event-card" data-toggle="modal" data-target="#myModal">
                    <img class="card-img-top" src="image/regional_2020/logoBcjjf-regionals.png" alt="Card image" style="width:100%">
                    <div class="row">
                        <div class="col-xs-2 bg-primary text-light p-2">
                            <em class="font-weight-bolder">Dec</em>
                            <em>12-13</em>
                        </div>
                        <div class="col-xs-10 p-2">
                            <em><i class="fas fa-map-marker-alt"></i> Vancouver, BC</em>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- MODAL REGISTER -->
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Pré Registration</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" @submit.prevent="submitPreschreduling" class="col-sm-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class='form-control' id="name" name="name" v-model="register.name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="name">Weight</label>
                                    <input type="number" class='form-control' id="weight" name="weight" min="30" placeholder="Weight in pounts" v-model="register.weight" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="gender">Gender</label>
                                    <select id="gender" class="form-control" v-model="register.gender" required>
                                        <option v-for='gender in genderList' v-text='gender.name' v-bind:key="gender.id" :value="gender.name"></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class='form-control' id="email" name="email" placeholder="your-email@example.com" v-model="register.email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phonenumber">Phone Number</label>
                                    <input type="number" class='form-control' id="phonenumber" name="phonenumber" placeholder="Numbers only" v-model="register.phonenumber">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="gym">Gym Name</label>
                                    <input type="text" class="form-control" id="gym" name="gym" v-model="register.gym">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="rank">Experience/ Rank</label>
                                    <select id="rank" class="form-control" v-model="register.rank" required>
                                        <option v-for='rank in rankList' v-text='rank.name' v-bind:key="rank.id" :value="rank.name"></option>
                                    </select>
                                </div>
                            </div>

                            <div id="termTournament" :class="['container', displayTerm()]">
                                <h3>Tournament Term:</h3>
                                <p>I, <b>{{register.name}}</b> do hereby submit my application for participation in the Regionals BCJJF Jiu-Jitsu Championship 2020 held at Roll Jiu Jitsu Academy from 12/12/2020 to 12/13/2020. I hereby assume full responsibility and liability for all damages, injuries and losses that I may sustain or incur while participating in or watching the tournament.</p>
                                <p>I realize that serious injury is commonplace in martial arts tournaments such as the one I am hereby entering and that death is a possibility. I also realize that if I am injured, I might be disfigured, disabled and/or rendered unable to work again. By entering into this competition I agree to and fully accept and assume liability for any and all injuries that I may incur expressly give up and waive any and all claims that I or anyone acting on my behalf or through me might have against British Columbia Jiu Jitsu Federation (BCJJF), Cleves Filip Goiano de Matos, Hayden Francis, the promoters, operators, sponsors, officials, participants, non-participants, or Roll Jiu Jitsu Academy for any injury regardless of its nature, effect or affect on me as a result of my participation and/or presence at the tournament.</p>
                                <p>I authorize, and agree to hold harmless, whatever medical personnel that may be present at the tournament to take any action necessary, should I become injured.</p>
                                <p>Any false information provided during registration such as DOB but not limited to; may lead to immediate disqualification; such actions are subject to suspension or even banishment from future BCJJF events.</p>
                                <p>I further understand that tickets will be sold to spectators to watch the tournament; that news media and others might cover the tournament and that it may also be videotaped or otherwise shown to audiences around the world. I hereby expressly and irrevocably forever consent to having my likeness shown, publicized, commented and/or reported on; and I do not expect to, and in fact waive any compensation I might otherwise be entitled to as a result thereof.</p>
                                <p>I represent that I am in good health; that I am not presently, nor will I participate while under the influence of any drug or medication; that no one affiliated with this tournament has encouraged me to enter or made any representations regarding my fitness or ability to participate; that I have read and understood every provision of this release; and that I am legally competent to and freely enter into this waiver, release and assumption of risk agreement.</p>
                                <p>If an athlete’s registration application is accepted and the athlete permitted to compete, Organizer hereby expressly reserves the right, in its sole and absolute discretion, with or without cause, to change, modify or otherwise edit information contained upon a the registration form, including but not limited to: the athlete’s academy's name and affiliation and/or the competitor's name and/or nickname. Organizer likewise expressly reserves the right, in its sole and absolute discretion, with or without cause, to add or remove an athlete from the open weight division.</p>
                                <p>Changes to an athlete’s registration including but not limited to academy affiliation will be permitted up to one business day before the registration deadline. There will be no changes permitted to an athlete’s after that time. If an athlete or coach of an athlete wishes to make a change, any such change(s) are strictly limited to: competitor's name/nickname, academy affiliation and those member's of the academy that will be competing in the open weight division.</p>
                                <p>The head coach of an academy's competition team shall be granted the right to change a competitor's registration information. Such changes are limited to: weight division, competitor's name/nickname, academy affiliation and those member's of the academy that will be competing in the open weight division.</p>
                                <p>I further understand that I am responsible for checking and must check my registration information for the event on the website on the registration list for: weight, belt, academy, age division, and name information by the specified registration check day. I further understand that the registration check day is the last possible day to make any corrections ( including typographical errors made by BCJJF), to my registration information for the event. I understand and acknowledge that after the registration check day, no changes will be made and no refunds will be given. I understand that if I don’t verify my information and send a notification for the correction by the specific time, no changes are permitted after that time and any mistakes in the brackets, whether or not caused by me, may lead to my immediate disqualification.</p>
                                <p>If Organizer shall be prevented from putting on the Event by reason of Force Majeure, such performance shall be excused and shall not be a breach of this Agreement. For purposes of this Agreement, “Force Majeure” shall mean any act of God, fire, flood, war or other calamity; strike or labor difficulties; any governmental action or any other serious emergency significantly affecting Organizer’s ability to put on the Event, which occurrence is beyond Organizer’s reasonable control, and which, despite Organizer’s good faith efforts, prohibits its ability to put on the Event. In the event that Organizer is forced to cancel, suspend or relocate the Event due to an event of Force Majeure, Competitor shall only be entitled to a refund of its Registration Fee, if Competitor notifies Organizer by email at ibjjf@ibjjf.com within twenty-four (24) hours of Competitor’s receipt of notice from Organizer of the modification to the Event logistics.</p>
                                <p>I acknowledge that I have read, understand, and agree to abide by the provisions set forth in the <a href="https://ibjjf.com/wp-content/uploads/2019/05/IBJJF_Rules_Book_v5.1.1_en-US.pdf">IBJJF rules book</a>. Similarly, I acknowledge that I have read, understand, and agree to abide by the provisions set forth on the event web page.</p>
                                <p>The BCJJF (hereinafter 'Organizer') hereby expressly reserves the right, in its sole and absolute discretion, with or without cause to deny a potential athlete/competitor’s registration/application for permission to compete in the event. The terms athlete and/or competitor may be used interchangeably.</p>
                                <p>In case of minors under 18 years old:</p>
                                <p>Furthermore, if the competitor is a minor I, Legal Guardian, hereby certify that I am parent and/or legal guardian of the above named minor who has been given my express permission to compete in the event for which we are registering. And, that I have read and understood every provision of the release of liability and that I am legally competent to and freely enter into this release of liability and assume all risk on behalf of the minor (competitor) named herein and any and all successors, assigns or any other representative acting upon the minor’s behalf.</p>
                                <p>I've read and have knowledge about the information contained in the tournament webpage, <a href="https://www.ibjjf.com">https://www.ibjjf.com</a>, <a href="https://cbjj.com.br">https://cbjj.com.br</a>, and I'm aware of the rules and regulations of this tournament.</p>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="Yes"  v-model="register.CheckAgree" required>I've read and agreed to the terms above.
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value="Yes"  v-model="register.CheckRead" required>I've read and have knowledge about the information contained in the tournament webpage, <a href="https://www.ibjjf.com">https://www.ibjjf.com</a>, <a href="https://cbjj.com.br">https://cbjj.com.br</a>, and I'm aware of the rules and regulations of this tournament.
                                    </label>
                                </div>
                                <button type="submit" name="submit" class="btn btn-danger"><i class="far fa-paper-plane"></i> Send</button>
                            </div>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


    </section>
</template>

<script>
export default {
    data(){
        return{
            // ---[POST]---
            register: {
                name: "",
                weight: "",
                email: "",
                gender: "",
                phonenumber: "",
                gym: "",
                rank: "",
                CheckAgree: "",
                CheckRead:""
            },

            // OBJECTS
            rankList :[
                {id:1,name:'Novice'},
                {id:2,name:'Intermediate'},
                {id:3,name:'Advanced'}
            ],
            genderList :[
                {id:1,name:'Female'},
                {id:2,name:'Male'}
            ],
        }
    },
    methods:{
        displayTerm(){
            if(this.register.name != "" && this.register.weight != "" && this.register.email != "" && this.register.gender != "" && this.register.phonenumber != "" && this.register.rank != ""){
                return 'd-block';
            }else{
                return 'd-none';
            }
        },
        cleanForm(){
                this.register.name = ""
                this.register.weight = ""
                this.register.email = ""
                this.register.gender = ""
                this.register.phonenumber = ""
                this.register.gym = ""
                this.register.rank = ""
                this.register.CheckAgree = ""
                this.register.CheckRead =""
        },
        submitPreschreduling(){ //-----[POST]------
            axios.post('/api/mail_prescheduling', this.register) //API ROUTE
            .then(response =>{
                alert(response.data)
                this.cleanForm()
                setTimeout(() => $('#myModal').modal('hide'), 1000);
            })
            // .catch(alert("Something went wrong, please contact us"))
        }
    }
}
</script>

<style>
.upcomingEvents{
    background-color: ghostwhite;
}
.event-card{
    cursor: pointer;
}
.event-card:hover{
    transition:all 0.5s ease;
    opacity: 0.7;
  }


</style>
