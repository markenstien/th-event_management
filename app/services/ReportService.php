<?php 

    namespace Services;

    class ReportService {

        public function __construct()
        {
            $this->appointment = model('AppointmentModel');
        }

        public function generate($startDate, $endDate) {
            $this->appointment->db->query(
                "SELECT * FROM {$this->appointment->table}
                    WHERE 
                    date between '{$startDate}' and '{$endDate}'
                    AND status = 'arrived'"
            );

            $appointments = $this->appointment->db->resultSet();

            return $appointments;   
        }

        public function summarize($results) {
            $retVal = [
                'events' => [],
                'packages' => []
            ];

            foreach ($results as $key => $row) {
                if (!isset($retVal['events'][$row->event])) {
                    $retVal['events'][$row->event] = 0;
                }

                if (!isset($retVal['packages'][$row->package])) {
                    $retVal['packages'][$row->package] = 0;
                }

                $retVal['events'][$row->event]++;
                $retVal['packages'][$row->package]++;
            }

            asort($retVal['events'], SORT_DESC);
            asort($retVal['packages'], SORT_DESC);

            return $retVal;
        }
    }