<?
	class HomematicDeviceProxy extends IPSModule
	{
		public function Create()
		{
			IPS_LogMessage(__CLASS__, __FUNCTION__);
			//Never delete this line!
			parent::Create();
			
			$this->RegisterPropertyInteger("MainHomematicInstance", 0);

            $this->ConnectParent("{A151ECE9-D733-4FB9-AA15-7F7DD10C58AF}");			
			
		}
		public function ApplyChanges()
		{
			IPS_LogMessage(__CLASS__, __FUNCTION__);	
			//Never delete this line!
			parent::ApplyChanges();
			
			
			
			
		}
		
		public function ReceiveData($JSONString)
		{
			IPS_LogMessage(__CLASS__, __FUNCTION__);
			IPS_LogMessage(__CLASS__,$JSONString);		

		}		

	}
?>
