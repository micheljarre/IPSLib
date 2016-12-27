<?

	class CheckMK extends IPSModule {
		
		public function Create() {
			//Never delete this line!
			parent::Create();
			
			$this->RegisterPropertyString("Server", "");
			$this->RegisterPropertyInteger("Port", 80);
			$this->RegisterPropertyString("Site", "");
			$this->RegisterPropertyString("Username", "");
			$this->RegisterPropertyString("Password", "");
			$this->RegisterPropertyInteger("Root", 0);
			$this->RegisterPropertyBoolean("Ping", "");
			$this->RegisterPropertyBoolean("WOL", "");
		}
	
		public function ApplyChanges() {
			//Never delete this line!
			parent::ApplyChanges();

		}
		
	}

?>
