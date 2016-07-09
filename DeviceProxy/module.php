<?

	class DeviceProxy extends IPSModule
	{
		public function Create()
		{
			//Never delete this line!
			parent::Create();
			
			$this->RegisterPropertyInteger("SourceInstance", 0);
			$this->RegisterPropertyString("Formula", "\$Value/10*sin(30)*pi()");
			
			$this->RegisterVariableFloat("Value", "Value", "", 0);
		}

		public function ApplyChanges()
		{
			
			//Never delete this line!
			parent::ApplyChanges();
			
			//Create our trigger
			if(IPS_VariableExists($this->ReadPropertyInteger("SourceInstance"))) {
				$eid = @IPS_GetObjectIDByIdent("SourceTrigger", $this->InstanceID);
				if($eid == false) {
					$eid = IPS_CreateEvent(0 /* Trigger */);
					IPS_SetParent($eid, $this->InstanceID);
					IPS_SetIdent($eid, "SourceTrigger");
					IPS_SetName($eid, "Trigger for #".$this->ReadPropertyInteger("SourceInstance"));
				}
				IPS_SetEventTrigger($eid, 0, $this->ReadPropertyInteger("SourceInstance"));
				//IPS_SetEventScript($eid, "SetValue(IPS_GetObjectIDByIdent(\"Value\", \$_IPS['TARGET']), DPR_DatapointChange(\$_IPS['TARGET'], \$_IPS['VALUE']));");
				IPS_SetEventActive($eid, true);
			}
			else
			{
				echo "Keine Instanz ausgewählt."
			}			
			
		}
		
		public function DatapointChange(float $Value)
		{		
			
			return $Value;
		
		}

	}

?>
