<?

	class Check_MK extends IPSModule {
		
		public function Create() {
			//Never delete this line!
			parent::Create();
			
			$this->RegisterPropertyString("Server", "");
			$this->RegisterPropertyInteger("Port", "");
			$this->RegisterPropertyString("Site", "");
			$this->RegisterPropertyString("Username", "");
			$this->RegisterPropertyString("Password", "");
			$this->RegisterPropertyBoolean("Ping", "");
			$this->RegisterPropertyBoolean("WOL", "");
		}
	
		public function ApplyChanges() {
			//Never delete this line!
			parent::ApplyChanges();

		}
		
	}

?>
