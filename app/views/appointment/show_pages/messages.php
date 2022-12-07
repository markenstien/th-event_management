<div class="col-md-8 mx-auto">
    <div style="border: 1px solid #000; padding:15px">
    <?php foreach($data['messages'] as $key => $row) :?>
        <?php wMessage($row);?>
    <?php endforeach?>
    <?php
        Form::open([
            'method' => 'post',
            'action' => _route('message:send')
        ]);
        Form::hidden('sender_id', whoIs('id'));
        Form::hidden('parent_id', $data['id']);
        if(isEqual(whoIs('user_type'), 'customer')) {
            Form::hidden('sender_type', 'customer');
        } else{
            Form::hidden('sender_type', 'vendor');
        }
    ?>
        <div class="form-group">
            <?php
                $snderDisplay =whoIs('user_type') == 'customer' ? '' : 'Sending As : '. COMPANY_NAME;
                Form::label('Send Message');
                Form::textarea('content', '', [
                    'class' => 'form-control',
                    'rows' => 2
                ]);
                Form::small($snderDisplay);
            ?>
        </div>

        <div class="form-group mt-2">
            <?php Form::submit('', 'Send Message', ['class' => 'btn btn-primary btn-sm'])?>
        </div>
    <?php Form::close()?>

    <?php
        function wMessage($data) 
        {
            $customerNameDisplay = whoIs('user_type') == 'customer' ? 'You' : 'Customer';
            

            $companyName = COMPANY_NAME;
            if(isEqual($data->sender_type, 'customer')) :
                echo <<<EOF
                <div class="alert alert-primary" style="margin-left: 60px">
                    <label for="#"><strong>{$customerNameDisplay}</strong></label>
                    <p class="alert-text">{$data->content}</p>
                    <small> Date Sent  : {$data->timesent} </small>                
                </div>
                EOF;
            else:
                echo <<<EOF
                <div class="alert alert-primary" style="margin-right: 60px">
                    <strong><label for="#">{$companyName}</label></strong>
                    <p class="alert-text">{$data->content}</p>
                    <small> Date Sent  : {$data->timesent} </small>
                </div>
                EOF;
            endif;
        }
    ?>
</div>