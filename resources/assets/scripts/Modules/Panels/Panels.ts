import Selector from '@tools/Selector';
import Panel from '@modules/Panels/Panel';
import Target from '@entities/Target';

/**
 * ...
 */
class Panels {
    /**
     * ...
     *
     * @type Array<Panel>
     */
    private panels = Array<Panel>();

    /**
     * The constructor.
     */
    public constructor() {
        this.initPanels();
    }

    /**
     * ...
     *
     * @return void
     */
    private initPanels(): void {
        Selector.element('panel').each((element: Element) => this.panels.push(new Panel(element)));
    }

    /**
     * ...
     *
     * @param id { string }
     *   ...
     *
     * @return Panel
     */
    public getPanel(id: string): Panel {
        for (const panel of this.panels) {
            if (panel.isEqualId(id)) {
                return panel;
            }
        }

        return null;
    }

    /**
     * ...
     *
     * @return Panel
     */
    public getVisiblePanel(): Panel {
        for (const panel of this.panels) {
            if (panel.getState().isVisible()) {
                return panel;
            }
        }

        return null;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public hasVisiblePanel(): boolean {
        for (const panel of this.panels) {
            if (panel.getState().isVisible()) {
                return true;
            }
        }

        return false;
    }

    /**
     * ...
     *
     * @param target { Target }
     *   ...
     *
     * @return void
     */
    public show(target: Target): void {
        if (this.hasVisiblePanel()) {
            const panel = this.getVisiblePanel();

            if (panel.getSide() === target.getSide()) {
                if (panel.getId() !== target.getPanelId()) {
                    panel.outside();
                    this.getPanel(target.getPanelId()).inside();
                }
            } else {
                setTimeout(() => panel.hide(), 300);
                this.getPanel(target.getPanelId()).show(target);
            }
        } else {
            this.getPanel(target.getPanelId()).show(target);
        }
    }

    /**
     * ...
     *
     * @return void
     */
    public hide(): void {
        for (const panel of this.panels) {
            panel.hide();
        }
    }
}

export default Panels;
