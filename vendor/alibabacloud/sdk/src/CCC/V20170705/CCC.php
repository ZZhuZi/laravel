<?php

namespace AlibabaCloud\CCC\V20170705;

use AlibabaCloud\ApiResolverTrait;

/**
 * @deprecated
 *
 * @method static AddNumberToSkillGroup addNumberToSkillGroup(array $options = [])
 * @method static AddPhoneNumber addPhoneNumber(array $options = [])
 * @method static AssignJobs assignJobs(array $options = [])
 * @method static AssignUsers assignUsers(array $options = [])
 * @method static CCCApiResolver cCCApiResolver(array $options = [])
 * @method static CallOnlinePrivacyNumber callOnlinePrivacyNumber(array $options = [])
 * @method static CancelJobs cancelJobs(array $options = [])
 * @method static CancelPredictiveJobs cancelPredictiveJobs(array $options = [])
 * @method static CommitContactFlowVersionModification commitContactFlowVersionModification(array $options = [])
 * @method static CreateBatchJobs createBatchJobs(array $options = [])
 * @method static CreateCCCPostOrder createCCCPostOrder(array $options = [])
 * @method static CreateContactFlow createContactFlow(array $options = [])
 * @method static CreateInstance createInstance(array $options = [])
 * @method static CreateJobGroup createJobGroup(array $options = [])
 * @method static CreateMedia createMedia(array $options = [])
 * @method static CreatePredictiveJobs createPredictiveJobs(array $options = [])
 * @method static CreateScenario createScenario(array $options = [])
 * @method static CreateScenarioFromTemplate createScenarioFromTemplate(array $options = [])
 * @method static CreateSkillGroup createSkillGroup(array $options = [])
 * @method static CreateSurvey createSurvey(array $options = [])
 * @method static CreateUser createUser(array $options = [])
 * @method static DeleteInstance deleteInstance(array $options = [])
 * @method static DeleteJobGroup deleteJobGroup(array $options = [])
 * @method static DeleteMedia deleteMedia(array $options = [])
 * @method static DeleteSkillGroup deleteSkillGroup(array $options = [])
 * @method static DeleteSurvey deleteSurvey(array $options = [])
 * @method static Dialogue dialogue(array $options = [])
 * @method static DownloadOriginalStatisticsReport downloadOriginalStatisticsReport(array $options = [])
 * @method static DownloadRecording downloadRecording(array $options = [])
 * @method static DownloadUnreachableContacts downloadUnreachableContacts(array $options = [])
 * @method static FindUsers findUsers(array $options = [])
 * @method static GenerateAgentStatisticReport generateAgentStatisticReport(array $options = [])
 * @method static GetAgentData getAgentData(array $options = [])
 * @method static GetAgentState getAgentState(array $options = [])
 * @method static GetCallMeasureSummaryReport getCallMeasureSummaryReport(array $options = [])
 * @method static GetConfig getConfig(array $options = [])
 * @method static GetContactIdentifyByOutBoundTaskId getContactIdentifyByOutBoundTaskId(array $options = [])
 * @method static GetConversationDetailByContactId getConversationDetailByContactId(array $options = [])
 * @method static GetConversationList getConversationList(array $options = [])
 * @method static GetInstance getInstance(array $options = [])
 * @method static GetInstanceState getInstanceState(array $options = [])
 * @method static GetInstanceSummaryReport getInstanceSummaryReport(array $options = [])
 * @method static GetInstanceSummaryReportByInterval getInstanceSummaryReportByInterval(array $options = [])
 * @method static GetInstanceSummaryReportSinceMidnight getInstanceSummaryReportSinceMidnight(array $options = [])
 * @method static GetJob getJob(array $options = [])
 * @method static GetJobDataUploadParams getJobDataUploadParams(array $options = [])
 * @method static GetJobGroup getJobGroup(array $options = [])
 * @method static GetJobList getJobList(array $options = [])
 * @method static GetJobStatusByCallId getJobStatusByCallId(array $options = [])
 * @method static GetJobTemplateDownloadParams getJobTemplateDownloadParams(array $options = [])
 * @method static GetNumberRegionInfo getNumberRegionInfo(array $options = [])
 * @method static GetPredictiveJob getPredictiveJob(array $options = [])
 * @method static GetScenario getScenario(array $options = [])
 * @method static GetServiceExtensions getServiceExtensions(array $options = [])
 * @method static GetSmsConfig getSmsConfig(array $options = [])
 * @method static GetSurvey getSurvey(array $options = [])
 * @method static GetTaskList getTaskList(array $options = [])
 * @method static GetUser getUser(array $options = [])
 * @method static LaunchAppraise launchAppraise(array $options = [])
 * @method static LaunchShortMessageAppraise launchShortMessageAppraise(array $options = [])
 * @method static ListAgentStates listAgentStates(array $options = [])
 * @method static ListAgentSummaryReports listAgentSummaryReports(array $options = [])
 * @method static ListAgentSummaryReportsByInterval listAgentSummaryReportsByInterval(array $options = [])
 * @method static ListAgentSummaryReportsSinceMidnight listAgentSummaryReportsSinceMidnight(array $options = [])
 * @method static ListBasicStatisticsReportSubItems listBasicStatisticsReportSubItems(array $options = [])
 * @method static ListCallDetailRecords listCallDetailRecords(array $options = [])
 * @method static ListCallMeasureSummaryReports listCallMeasureSummaryReports(array $options = [])
 * @method static ListConfig listConfig(array $options = [])
 * @method static ListContactFlows listContactFlows(array $options = [])
 * @method static ListIvrTrackingDetail listIvrTrackingDetail(array $options = [])
 * @method static ListJobGroups listJobGroups(array $options = [])
 * @method static ListJobStatus listJobStatus(array $options = [])
 * @method static ListJobsByGroup listJobsByGroup(array $options = [])
 * @method static ListMedias listMedias(array $options = [])
 * @method static ListOutboundPhoneNumberOfUser listOutboundPhoneNumberOfUser(array $options = [])
 * @method static ListPhoneNumbers listPhoneNumbers(array $options = [])
 * @method static ListPredictiveJobStatus listPredictiveJobStatus(array $options = [])
 * @method static ListPrivacyNumberCallDetails listPrivacyNumberCallDetails(array $options = [])
 * @method static ListPrivilegesOfUser listPrivilegesOfUser(array $options = [])
 * @method static ListRealTimeAgent listRealTimeAgent(array $options = [])
 * @method static ListRecentCallRecords listRecentCallRecords(array $options = [])
 * @method static ListRecordingOfDualTrack listRecordingOfDualTrack(array $options = [])
 * @method static ListRecordings listRecordings(array $options = [])
 * @method static ListRecordingsByContactId listRecordingsByContactId(array $options = [])
 * @method static ListRoles listRoles(array $options = [])
 * @method static ListScenarioTemplates listScenarioTemplates(array $options = [])
 * @method static ListScenarios listScenarios(array $options = [])
 * @method static ListSkillGroupStates listSkillGroupStates(array $options = [])
 * @method static ListSkillGroupSummaryReports listSkillGroupSummaryReports(array $options = [])
 * @method static ListSkillGroupSummaryReportsByInterval listSkillGroupSummaryReportsByInterval(array $options = [])
 * @method static ListSkillGroupSummaryReportsSinceMidnight listSkillGroupSummaryReportsSinceMidnight($options = [])
 * @method static ListSkillGroups listSkillGroups(array $options = [])
 * @method static ListSkillGroupsOfUser listSkillGroupsOfUser(array $options = [])
 * @method static ListSurveys listSurveys(array $options = [])
 * @method static ListUnreachableContacts listUnreachableContacts(array $options = [])
 * @method static ListUsers listUsers(array $options = [])
 * @method static ListUsersOfSkillGroup listUsersOfSkillGroup(array $options = [])
 * @method static ModifyMedia modifyMedia(array $options = [])
 * @method static ModifyNotificationConfig modifyNotificationConfig(array $options = [])
 * @method static ModifyPhoneNumber modifyPhoneNumber(array $options = [])
 * @method static ModifyPrivacyNumberCallDetail modifyPrivacyNumberCallDetail(array $options = [])
 * @method static ModifyScenario modifyScenario(array $options = [])
 * @method static ModifySkillGroup modifySkillGroup(array $options = [])
 * @method static ModifySkillGroupOfUser modifySkillGroupOfUser(array $options = [])
 * @method static ModifySurvey modifySurvey(array $options = [])
 * @method static ModifyUser modifyUser(array $options = [])
 * @method static PickLocalNumber pickLocalNumber(array $options = [])
 * @method static PickOutboundNumbers pickOutboundNumbers(array $options = [])
 * @method static PreCreateMedia preCreateMedia(array $options = [])
 * @method static PreModifyMedia preModifyMedia(array $options = [])
 * @method static PublishContactFlowVersion publishContactFlowVersion(array $options = [])
 * @method static PublishSurvey publishSurvey(array $options = [])
 * @method static QueryRedialIndicator queryRedialIndicator(array $options = [])
 * @method static RefreshToken refreshToken(array $options = [])
 * @method static RemoveNumberFromSkillGroup removeNumberFromSkillGroup(array $options = [])
 * @method static RemovePhoneNumber removePhoneNumber(array $options = [])
 * @method static RemoveUsers removeUsers(array $options = [])
 * @method static RemoveUsersFromSkillGroup removeUsersFromSkillGroup(array $options = [])
 * @method static RequestLoginInfo requestLoginInfo(array $options = [])
 * @method static ResumeJobs resumeJobs(array $options = [])
 * @method static SendPredefinedShortMessage sendPredefinedShortMessage(array $options = [])
 * @method static SimpleDial simpleDial(array $options = [])
 * @method static StartBack2BackCall startBack2BackCall(array $options = [])
 * @method static StartJob startJob(array $options = [])
 * @method static SubmitBatchJobs submitBatchJobs(array $options = [])
 * @method static SuspendJobs suspendJobs(array $options = [])
 * @method static TwoPartiesCall twoPartiesCall(array $options = [])
 */
class CCC
{
    use ApiResolverTrait;
}
