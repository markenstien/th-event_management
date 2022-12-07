<?php 

    class ContactController extends Controller
    {
        public function create() {
            $req = request()->inputs();

            if(isSubmitted()) {
                $post = request()->posts();
                $customerHTML = "<h2>Your Inquiry has been sent</h2>";
                $teamHTML = "<h2>Someone Just sent an Inquiry</h2>";

                $emailInfo = <<<EOF
                    <table>
                        <tr>
                            <td>Name : </td>
                            <td>{$post['name']}</td>
                        </tr>
                        <tr>
                            <td>Phone : </td>
                            <td>{$post['phone']}</td>
                        </tr>
                        <tr>
                            <td>Message : </td>
                            <td>{$post['message']}</td>
                        </tr>
                    </table>
                    <hr/>
                    <div style='margin-top:10px'>Sent Using : {$post['email']}</div>
                EOF;
                
                $customerHTML .= $emailInfo;
                $teamHTML .= $emailInfo;

                $customerHTML = wEmailBody($customerHTML);
                $teamHTML = wEmailBody($teamHTML);

                $toCustomer = _mail($post['email'], "You sent an Inquiry to ". COMPANY_NAME, $customerHTML);
                $toTheTeam = _mail($post['email'], "A customer sent and Inquiry", $teamHTML);

                Flash::set("If your email provided is valid, you will recieve and email from us, regarding your inquiry, thank you.");
                if (isset($req['returnTo'])) {
                    return redirect(unseal($req['returnTo']));
                } else {
                    return request()->return();
                }
            }
        }
    }