<?

	class CheckMK extends IPSModule {
		
		const CMK_URL_ALLHOSTS =  "check_mk/view.py?view_name=allhosts";  
		const CMK_URL_JSON 	=  "output_format=JSON";  
				
		public function Create() {
			//Never delete this line!
			parent::Create();
			
			$this->RegisterPropertyString("Server", "");
			$this->RegisterPropertyInteger("Port", 80);
			$this->RegisterPropertyString("Site", "");
			$this->RegisterPropertyString("Username", "");
			$this->RegisterPropertyString("Password", "");
			$this->RegisterPropertyInteger("Root", 0);
						
			$this->RegisterPropertyInteger("DataMinutes", 1);
			$this->RegisterPropertyInteger("ConfigHours", 12);			
					
			$this->RegisterPropertyBoolean("Ping", "");
			$this->RegisterPropertyBoolean("WOL", "");	
			
			$this->RegisterTimer("ConfigTimer", 0, 'CMK_UpdateConfig();');			
			$this->RegisterTimer("UpdateTimer", 0, 'CMK_UpdateData();');						
		}
	
		public function ApplyChanges() {
			//Never delete this line!
			parent::ApplyChanges();			
			$this->SetTimerInterval("ConfigTimer", $this->ReadPropertyInteger("ConfigHours") * 1000 * 60);
			$this->SetTimerInterval("ConfigTimer", $this->ReadPropertyInteger("DataMinutes") * 1000 * 60);
			$this-> UpdateConfig();
			
		}
		
		public function UpdateConfig()
		{
			IPS_LogMessage(__CLASS__, "Aktualisiere Konfigurationsdaten zu Site " . $this->ReadPropertyString("Site"));
			
			$url = 'http://' . $this->ReadPropertyString("Username") . ':' . $this->ReadPropertyString("Password") . '@' . $this->ReadPropertyString("Server") . ':'  . $this->ReadPropertyString("Port") . '/' . $this->ReadPropertyString("Site") . '/' . CMK_URL_ALLHOSTS . '&' . CMK_URL_JSON;
			
			$config = json_decode(file_get_contents($url));
			
			
			
			
		}
		
		
		public function UpdateData()
		{
			IPS_LogMessage(__CLASS__, "Aktualisiere Monitoringdaten zu Site " . $this->ReadPropertyString("Site"));
			
			
		}		
		
	}

?>
