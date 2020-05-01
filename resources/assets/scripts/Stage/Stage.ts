import StageVision from './StageVision';
import Backstage from './Backstage/Backstage';
import Panels from './Panels/Panels';

/**
 * ...
 */
class Stage {
    /**
     * ...
     */
    private vision: StageVision;

    /**
     * ...
     */
    private backstage: Backstage;

    /**
     * ...
     */
    private panels: Panels;

    /**
     * The constructor.
     */
    private constructor() {
        this.vision = new StageVision();
        this.backstage = new Backstage();
        this.panels = new Panels();
    }

    /**
     * ...
     *
     * @param target { Array<string> }
     *   ...
     *
     * @return void
     */
    public show(target: Array<string>): void {
        this.vision.show();
        this.backstage.show();
        this.panels.show(target);
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        this.panels.hide();
        this.backstage.hide();
        this.vision.hide();
    }
}

export default Stage;
