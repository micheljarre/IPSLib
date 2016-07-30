<?
	class HomematicDeviceProxy extends IPSModule
	{
		private $MainHomematicAddress;
		
		public function Create()
		{
			IPS_LogMessage(__CLASS__, __FUNCTION__);
			//Never delete this line!
			parent::Create();			
			$this->RegisterPropertyInteger("MainHomematicInstance", 0);
			
		}
		
		public function ApplyChanges()
		{
			IPS_LogMessage(__CLASS__, __FUNCTION__);	
			//Never delete this line!
			parent::ApplyChanges();
			
			$this->ConnectParent("{A151ECE9-D733-4FB9-AA15-7F7DD10C58AF}");
			
			if ($this -> ReadPropertyInteger($MainHomematicInstance) > 0)
			{
				$this -> $MainHomematicAddress = IPS_GetProperty($this -> $MainHomematicInstance, 'Address');
				IPS_LogMessage(__CLASS__, $this -> $MainHomematicAddress);
			}
			
		}
		
		public function ReceiveData($JSONString)
		{
			IPS_LogMessage(__CLASS__, __FUNCTION__);
			IPS_LogMessage(__CLASS__, print_r(json_decode($JSONString),1));

		}		

	}
?>
